<?php

namespace SymfonySi\Test;

use SymfonySi\LocalePack\Package;
use org\bovigo\vfs\vfsStream;
use org\bovigo\vfs\vfsStreamWrapper;
use org\bovigo\vfs\vfsStreamDirectory;
use PHPUnit\Framework\TestCase;

class PackageTest extends TestCase
{
    protected $config;

    public function setUp()
    {
        vfsStreamWrapper::register();
        $root = new vfsStreamDirectory('root');
        vfsStreamWrapper::setRoot($root);
        vfsStream::copyFromFileSystem(__DIR__.'/../package');

        $this->config = [
            'version' => '1.0.4',
            'configFile' => vfsStream::url('root/app/code/community/Slovenian/LocalePackSl/etc/config.xml'),
            'packageFile' => vfsStream::url('root/package.xml'),
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
            '<version>1.0.4</version>', file_get_contents(vfsStream::url('root/app/code/community/Slovenian/LocalePackSl/etc/config.xml'))
        );
    }

    public function testPatchPackageFile()
    {
        $patchPackageFile = self::getMethod('patchPackageFile');
        $obj = new Package($this->config);
        $patchPackageFile->invoke($obj);
        $contents = file_get_contents(vfsStream::url('root/package.xml'));

        $this->assertContains(
            '<version>1.0.4</version>', $contents
        );

        $this->assertContains(
            '<date>'.date('Y-m-d').'</date>', $contents
        );

        $this->assertContains(
            '<time>'.date('H:i:s').'</time>', $contents
        );
    }

    /**
     * @dataProvider xmlProvider
     */
    public function testGetFilePath($xml, $fileName, $expectedFilePath)
    {
        $dom = new \DOMDocument;
        $dom->load($xml);
        $files = $dom->getElementsByTagName('file');
        $nodeItem = null;
        foreach($files as $file) {
            if ($file->getAttribute('name') == $fileName) {
                $nodeItem = $file;
                break;
            }
        }

        $method = self::getMethod('getFilePath');
        $obj = new Package($this->config);
        $filePath = $method->invoke($obj, $nodeItem);
        $this->assertEquals($filePath, $expectedFilePath);
    }

    public function xmlProvider()
    {
        $file = __DIR__.'/Fixtures/package.xml';
        return [
            [$file, 'Mage_Adminhtml.csv', 'app/locale/sl_SI/Mage_Adminhtml.csv'],
            [$file, 'Mage_AdminNotification.csv', 'app/locale/sl_SI/Mage_AdminNotification.csv'],
            [$file, 'Slovenian_LocalePackSl.xml', 'app/etc/modules/Slovenian_LocalePackSl.xml'],
            [$file, 'config.xml', 'app/code/community/Slovenian/LocalePackSl/etc/config.xml'],
            [$file, 'localepacksl.xml', 'app/design/adminhtml/default/default/layout/slovenian/localepacksl.xml'],
            [$file, 'setup.js', 'js/slovenian/setup.js'],
        ];
    }
}
