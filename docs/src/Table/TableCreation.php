<?php
namespace mrv1187\Table;

class TableCreation
{

    public static function createTable($data) : string
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
        return "<table class='table'>" . implode('', $lines) . "</table>";
    }



}