#!/usr/bin/php
<?php
    $i = 0;
    $arr_of_words = [];
    while (++$i < $argc)
    {
        if (trim($argv[$i]) !== "")
        {
            $tmp = split("([ ]+)", trim($argv[$i]));
            for($u = 0; $u < count($tmp); $u++)
                array_push($arr_of_words, $tmp[$u]);    
        }
    }
    sort($arr_of_words, SORT_STRING);
    $i = 0;
    while ($i < count($arr_of_words))
    {
        echo "$arr_of_words[$i]\n";
        $i++;
    }
?>
