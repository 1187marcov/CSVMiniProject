<?php

namespace mrv1187;

class ArrayFilter
{
    public static function filter($data)
    {
        $newArray = array();
        foreach($data as $row)
        {
            $internalArray = array();
            for($i=0;$i<sizeof($row)/2;$i++)
            {
                $internalArray[] = $row[$i];
            }
            $newArray[] = $internalArray;
        }
        return $newArray;
    }
}