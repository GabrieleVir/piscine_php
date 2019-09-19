#!/usr/bin/php
<?php

    function cmp($a, $b)
    {
        $tmp = $a;
        $tmp2 = $b;
        $i = 0;
        $lena = strlen($tmp);
        $lenb = strlen($tmp2);
        if ($lena > $lenb)
            $lenc = $lena;
        else
            $lenc = $lenb;
        while ($i < $lenc)
        {
            if ($tmp[$i] === '')
                return (0);
            if ($tmp2[$i] === '')
                return (1);
            $resultata = 0;
            $resultatb = 0;
            $val1 = ord($tmp[$i]);
            $val2 = ord($tmp2[$i]);
            if (($val1 >= 48 && $val1 <= 57) || $val1 > 122)
                $resultata += $val1 - 48 + 200;
            else if ($val1 <= 90 && $val1 >= 65)
                $resultata += $val1 - 65 + 97;
            else if ($val1 >= 97 && $val1 <= 122)
                $resultata += $val1;
            else
                $resultata += $val1 + 400;
            if (($val2 >= 48 && $val2 <= 57) || $val2 > 122)
                $resultatb +=$val2 - 48 + 200;
            else if ($val2 <= 90 && $val2 >= 65)
                $resultatb += $val2 - 65 + 97;
            else if ($val2 >= 97 && $val2 <= 122)
                $resultatb += $val2;
            else
                $resultatb += $val2 + 400;
            if ($resultata == $resultatb)            
                $i++;
            else
                return ($resultata > $resultatb);
        }
        return (-1);
    }

    $i = 0;
    $arr_of_words = [];
    while (++$i < $argc)
    {
        if ($argv[$i] !== "")
        {
            $tmp = preg_split("/\s+/", trim($argv[$i]));
            for($u = 0; $u < count($tmp); $u++)
            {
                if ($tmp[$u] !== "")
                    array_push($arr_of_words, $tmp[$u]);
            }    
        }
    }
    usort($arr_of_words, "cmp");
    $i = 0;
    while ($i < count($arr_of_words))
    {
        echo "$arr_of_words[$i]\n";
        $i++;
    }
?>