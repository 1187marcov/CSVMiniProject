<?php
namespace mrv1187\Table;

echo Headers::headersFromCSV('data/data.csv');

class Headers
{
    public static function headersFromCSV(String $filesource) :array
    {
        $file = fopen($filesource, 'r');
        $headers = array();
        while (($line = fgetcsv($file, 999, ",")) !== false)
        {
            $headers = $line;
            break;
        }
        fclose($file);
        return $headers;
    }



}