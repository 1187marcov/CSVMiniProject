<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class FileTest extends TestCase
{
    public function testDataDirectory()
    {
        $this->assertDirectoryExists('data');
    }

    public function testCSVFileExists()
    {
        $this->assertFileExists('data/data.csv');
    }

    public function testFileObject()
    {
        $file = new File();
        print_r($file);
    }

    public function testConvertFile()
    {
        $this -> assertFileIsReadable('data/data.csv');
        $records = File::fileToArray("data/data.csv");
        print_r($records);
    }
}