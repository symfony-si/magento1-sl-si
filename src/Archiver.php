<?php

namespace SymfonySi\LocalePack;

class Archiver
{
    /**
     * @var array
     */
    private $files = [];

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $rootDir;

    /**
     * @var string
     */
    private $tmpName = 'package';

    /**
     * Archiver constructor.
     *
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = basename($name);
        $this->rootDir = dirname($name);
    }

    /**
     * Add file.
     *
     * @param string $file
     * @param string $fileInArchive
     */
    public function addFile($file, $fileInArchive)
    {
        $this->files[] = [$file, $fileInArchive];
    }

    /**
     * Create tgz archive.
     */
    public function compress()
    {
        $tarFile = $this->rootDir.'/'.$this->tmpName.'.tar';
        $tgzFile = $this->rootDir.'/'.$this->tmpName.'.tgz';

        $phar = new \PharData($tarFile);

        foreach ($this->files as $file) {
            $phar->addFile($file[0], $file[1]);
        }

        // Compress .tar file to .tgz
        $phar->compress(\Phar::GZ, '.tgz');
        rename($tgzFile, $this->rootDir.'/'.$this->name);

        // Both files (.tar and .tgz) exist. Remove the temporary .tar archive
        unlink($tarFile);
    }
}
