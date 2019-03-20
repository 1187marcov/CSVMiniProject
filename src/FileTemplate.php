<?php

class FileTemplate
{
    public static function readCSVArray(String $filename, String $class):array
    {
        $records = Array();
        $count = 0;
        $fieldNames='';

        if (($handle= fopen($filename, "r")) !==FALSE) {
            while (($row = fgetcsv($handle, 100, ",")) !==FALSE) {

                if($count==0){
                    $fieldNames = $row;
                }
                else {
                    $records[] = (object) array_combine($fieldNames, $row);
                }
                $count++;
            }
            fclose($handle);
        }
        return $records;
    }

    public static function headersFromCSV(String $filesource) :array
    {
        $file = fopen($filesource, 'r');
        $headers = array();
        while (($line = fgetcsv($file, 999, ",")) !== false)
        {
            array_push($headers, $line);
            break;
        }
        fclose($file);
        return $headers;
    }

    public static function columnsFromCsV(String $filesource) :array
    {
        $file = fopen($filesource, 'r');
        $columns = array();
        $row = array();
        $num = 0;
        while (($line = fgetcsv($file, 999, ",")) !== false)
        {
            if($num==0)
            {
                $num++;
                continue;
            }
            else{
                array_push($row, $line);
            }
        }
        fclose($file);
        return $columns;
    }

}

