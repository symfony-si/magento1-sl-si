<?php

namespace SymfonySi\Test;

use SymfonySi\LocalePack\Package;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamWrapper;
use org\bovigo\vfs\vfsStreamDirectory;

class PackageTest extends \PHPUnit_Framework_TestCase
{
    protected $config;

    public function setUp()
    {
        vfsStreamWrapper::register();
        $root = new vfsStreamDirectory('myroot');
        vfsStreamWrapper::setRoot($root);
        vfsStream::copyFromFileSystem(__DIR__.'/../package', $root);

        $this->config = [
            'version' => '1.0.4',
            'configFile' => vfsStream::url('myroot/app/code/community/Slovenian/LocalePackSl/etc/config.xml'),
            'packageFile' => vfsStream::url('myroot/package.xml'),
        ];
    }

    protected static function getMethod($name)
    {
        $class = new \ReflectionClass('SymfonySi\LocalePack\Package');
        $method = $class->getMethod($name);
        $method->setAccessible(true);

        return $method;
    }

    public function testPatchConfigFile()
    {
        $patchConfigFile = self::getMethod('patchConfigFile');
        $obj = new Package($this->config);
        $patchConfigFile->invoke($obj);

        $this->assertContains(
            '<version>1.0.4</version>', file_get_contents(vfsStream::url('myroot/app/code/community/Slovenian/LocalePackSl/etc/config.xml'))
        );
    }
}