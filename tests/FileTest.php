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
        $file = new \mrv1187\file\FileToArray();
        print_r($file);
    }

    public function testConvertFile()
    {
        $this->assertFileIsReadable("data/data.csv");
        $records = \mrv1187\file\FileToArray::fileToArray("data/data.csv");
        print_r($records);
    }

    public function testTableArray()
    {
        $data = \mrv1187\file\FileToArray::fileToArray("data/data.csv");
        $this->assertIsArray($data);
        $table= \mrv1187\table\TableCreation::createTable($data);
        print_r($table);
    }

}