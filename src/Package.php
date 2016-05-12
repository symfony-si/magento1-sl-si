<?php

namespace SymfonySi\LocalePack;

class Package
{
    /** @var string Package name */
    private $name;

    /** @var string Package version */
    private $version;

    /** @var string Path to module configuration file */
    private $configFile;

    /** @var string Path to generated package.xml file */
    private $packageFile;

    /** @var array Output messages */
    private $output = [];

    /**
     * Constructor.
     *
     * @param array Configuration.
     */
    public function __construct(array $config = [])
    {
        $this->version = $config['version'];
        $this->configFile = $config['configFile'];
        $this->packageFile = $config['packageFile'];
        $this->packageDir = dirname($this->packageFile);
        $this->rootDir = $this->packageDir.'/..';

        // Set package name
        $dom = new \DOMDocument;
        $dom->load($this->packageFile);
        $this->name = $dom->getElementsByTagName('name')->item(0)->nodeValue;
    }

    /**
     * Build tar gzip archive file.
     *
     * @return true|false Whether successful or not.
     */
    public function build()
    {
        // Patch config file first
        $this->patchConfigFile();
        // Patch package.xml file
        $this->patchPackageFile();

        $tarFile = $this->rootDir.'/'.$this->name.'.tar';
        $tgzFile = $this->rootDir.'/'.$this->name.'.tgz';

        // Create tar archive
        $phar = new \PharData($tarFile);
        // add all files in the project
        $phar->buildFromDirectory($this->packageDir);

        // Compress .tar file to .tgz
        $phar->compress(\Phar::GZ, '.tgz');
        rename($tgzFile, $this->rootDir.'/'.$this->name.'-'.$this->version.'.tgz');
        $this->output[] = $this->name.'-'.$this->version.'.tgz created';

        // Both files (.tar and .tgz) exist. Remove the temporary .tar archive
        unlink($tarFile);

        return implode($this->output, "\n");
    }

    /**
     * Patches module config file with new version.
     */
    private function patchConfigFile()
    {
        $dom = new \DOMDocument;
        $dom->load($this->configFile);
        $dom->getElementsByTagName('version')->item(0)->nodeValue = $this->version;
        $dom->saveXML();
        $msg = $dom->save($this->configFile);
        $this->output[] = 'Module config.xml updated: '.$msg.' bytes written.';
    }

    /**
     * Patches existing package.xml file with current time, date and md5 hashes of included files.
     */
    private function patchPackageFile()
    {
        $dom = new \DOMDocument;
        $dom->load($this->packageFile);

        $files = $dom->getElementsByTagName('file');
        foreach($files as $file) {
            $filePath = $file->getAttribute('name');
            $curNode = $file->parentNode;
            while($curNode->nodeName == 'dir') {
                $filePath = $curNode->getAttribute('name').'/'.$filePath;
                $curNode = $curNode->parentNode;
            }

            $target = $curNode->getAttribute('name');
            if ($target == 'magecommunity') {
                $targetDir = 'app/code/community';
            } else if ($target == 'magedesign') {
                $targetDir = 'app/design';
            } else if ($target == 'magelocale') {
                $targetDir = 'app/locale';
            } else if ($target == 'mageetc') {
                $targetDir = 'app/etc';
            } else if ($target == 'mageweb') {
                $targetDir = '';
            }

            $filePath = __DIR__.'/../package/'.$targetDir.'/'.$filePath;
            if (file_exists($filePath)) {
                $md5 = md5_file($filePath);
                $file->setAttribute('hash', $md5);
            } else {
                $this->output[] = 'Warning: File '.basename($filePath).' not found.';
            }
        }

        // Set current time and date
        $dom->getElementsByTagName('date')->item(0)->nodeValue = date('Y-m-d');
        $dom->getElementsByTagName('time')->item(0)->nodeValue = date('H:i:s');

        // Set package archive version from module configuration
        $dom->getElementsByTagName('version')->item(0)->nodeValue = $this->version;

        $dom->saveXML();
        $msg = $dom->save($this->packageFile);
        $this->output[] = 'package.xml patched. '.$msg.' bytes written.';
    }
}
