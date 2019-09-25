#!/usr/bin/php
<?php
    if ($argc == 1)
        exit ;
    if (trim($argv[1]) === "")
        exit ;
    $arr = split("([ ]+)", trim($argv[1]));
    $arr_len = count($arr);
    $i = 1;
    while ($i < $arr_len)
    {
        echo "$arr[$i] ";
        $i++;
    }
    echo "$arr[0]\n";
?>