<?php
declare(strict_types=1);

namespace mrv1187;
use PHPUnit\Framework\TestCase;
use mrv1187\Table\TableCreation;

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
        $file = new FileToArray();
        print_r($file);
    }

    public function testConvertFile()
    {
        $this->assertFileIsReadable("data/data.csv");
        $records = FileToArray::fileToArray("data/data.csv");
        print_r($records);
    }

    public function testTableArray()
    {
        $data = FileToArray::fileToArray("data/data.csv");
        $this->assertIsArray($data);
        $table= TableCreation::createTable($data);
        print_r($table);
    }

    public function testArrayFilter()
    {
        $data = FileToArray::fileToArray("data/data.csv");
        $this->assertIsArray($data);
        $table = ArrayFilter::filter($data);
        print_r($table);
    }



}