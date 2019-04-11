<?php

class File
{
    public function fileToArray(String $filesource): array
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
        return $dataArray;
    }

    public function createTable($data) : string
    {
        if (is_array($data)== false)
        {
            return "Input is not valid array";
        }
        $lines = array();
        foreach ($data as $row) {
            $cells = array();
            foreach ($row as $cell) {
                $cells[] = "<td>{$cell}</td>";
            }
            $lines[] = "<tr>" . implode('', $cells) . "</tr>";
        }
        echo "<table class='table'>" . implode('', $lines) . "</table>";
    }

}

