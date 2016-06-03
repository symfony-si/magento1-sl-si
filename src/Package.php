<?php

namespace SymfonySi\LocalePack;

class Package
{
    /**
     * @var string Package name
     */
    private $name;

    /**
     * @var string Package version
     */
    private $version;

    /**
     * @var string Path to module configuration file
     */
    private $configFile;

    /**
     * @var string Path to generated package.xml file
     */
    private $packageFile;

    /**
     * @var string Package directory.
     */
    private $packageDir;

    /**
     * @var array Output log messages
     */
    private $log = [];

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
        $files = $this->patchPackageFile();

        // Create tgz archive
        $archiver = new Archiver($this->name.'-'.$this->version.'.tgz');

        // add all files defined in package.xml file
        foreach ($files as $file) {
            $archiver->addFile($file, str_replace($this->packageDir, '', $file));
        }

        // add package.xml
        $archiver->addFile($this->packageFile, str_replace($this->packageDir, '', $this->packageFile));

        $archiver->compress();

        $this->log[] = $this->name.'-'.$this->version.'.tgz created';

        return implode($this->log, "\n");
    }

    /**
     * Patches module config file with new version.
     */
    private function patchConfigFile()
    {
        $dom = new \DOMDocument();
        $dom->load($this->configFile);
        $dom->getElementsByTagName('version')->item(0)->nodeValue = $this->version;
        $dom->saveXML();
        $msg = $dom->save($this->configFile);
        $this->log[] = 'Module config.xml updated: '.$msg.' bytes written.';
    }

    /**
     * Patches existing package.xml file with current time, date and md5 hashes of included files.
     *
     * @return array
     */
    private function patchPackageFile()
    {
        $filesInPackage = [];

        $dom = new \DOMDocument;
        $dom->load($this->packageFile);

        $files = $dom->getElementsByTagName('file');
        foreach ($files as $file) {
            $filePath = $this->packageDir.'/'.$this->getFilePath($file);

            if (file_exists($filePath)) {
                $md5 = md5_file($filePath);
                $file->setAttribute('hash', $md5);
                $filesInPackage[] = $filePath;
            } else {
                $this->log[] = 'Warning: File '.basename($filePath).' not found.';
            }
        }

        // Set current time and date
        $dom->getElementsByTagName('date')->item(0)->nodeValue = date('Y-m-d');
        $dom->getElementsByTagName('time')->item(0)->nodeValue = date('H:i:s');

        // Set package archive version from module configuration
        $dom->getElementsByTagName('version')->item(0)->nodeValue = $this->version;

        $dom->saveXML();
        $msg = $dom->save($this->packageFile);
        $this->log[] = 'package.xml patched. '.$msg.' bytes written.';

        return $filesInPackage;
    }

    /**
     * Get file path for file from DOMNode.
     *
     * @param \DOMNode
     *
     * @return string
     */
    private function getFilePath(\DOMNode $file)
    {
        $curNode = $file->parentNode;
        $filePath = $file->getAttribute('name');
        while ($curNode->nodeName == 'dir') {
            $filePath = $curNode->getAttribute('name').'/'.$filePath;
            $curNode = $curNode->parentNode;
        }

        $target = $curNode->getAttribute('name');
        $targetDir = '';
        if ($target == 'magecommunity') {
            $targetDir = 'app/code/community';
        } elseif ($target == 'magedesign') {
            $targetDir = 'app/design';
        } elseif ($target == 'magelocale') {
            $targetDir = 'app/locale';
        } elseif ($target == 'mageetc') {
            $targetDir = 'app/etc';
        } elseif ($target == 'mageweb') {
            $targetDir = '';
        }

        $filePath = ($targetDir == '') ? $filePath : $targetDir.'/'.$filePath;

        return $filePath;
    }
}
