<?php
namespace mrv1187\Table;

echo Headers::headersFromCSV('data/data.csv');

class Headers
{
    public static function headersFromCSV(String $filesource) :array
    {
        $file = fopen($filesource, 'r');
        $headers = array();
        $dataArray = array();
        $num = 0;
        while (($line = fgetcsv($file, 999, ",")) !== false) {
            if ($num == 0) {
                $headers = $line;
                $num++;
            } else {
                $dataArray[] = (object)array_combine($headers, $line);
            }
        }
        fclose($file);
        return $headers;
    }



}