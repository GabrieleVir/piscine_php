#!/usr/bin/php
<?php

while (1)
{
    echo "Enter a number: ";
    $a = trim(fgets(STDIN));
    if (feof(STDIN))
        break ;
    if (is_numeric($a) == FALSE)
        echo "'$a' is not a number\n";
    else
    {
        if ($a % 2 == 0)
            echo "The number " . (int)$a . " is even\n";
        else
            echo "The number " . (int)$a . " is odd\n";
    }
}
echo "\n";
?>