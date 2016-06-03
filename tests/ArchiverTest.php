<?php

namespace SymfonySi\Test;

use SymfonySi\LocalePack\Archiver;

class ArchiverTest extends \PHPUnit_Framework_TestCase
{
    public function setUp()
    {
        if (!is_dir($folder = __DIR__.'/files')) {
            mkdir($folder, 0777);
        }

        if (is_file($file = __DIR__.'/files/locale.tgz')) {
            unlink($file);
        }
    }

    public function testCompress()
    {
        $archiver = new Archiver(__DIR__.'/files/locale.tgz');

        $archiver->addFile(__DIR__.'/Fixtures/package.xml', 'package.xml');

        $archiver->compress();

        $this->assertFileExists(__DIR__.'/files/locale.tgz');
    }
}
