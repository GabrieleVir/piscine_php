#!/usr/bin/php
<?php

function error()
{
    echo "Syntax Error\n";
    exit ;
}

function do_op($op, $nb1, $nb2)
{
    if (($op == '/' || $op == '%') && $nb2 == 0)
        error();
    switch($op){
    case '+':
        echo $nb1 + $nb2 . "\n"; 
        break ;
    case '-':
        echo $nb1 - $nb2 . "\n"; 
        break ;
    case '*':
        echo $nb1 * $nb2 . "\n"; 
        break ;
    case '/':
        echo $nb1 / $nb2 . "\n"; 
        break ;
    case '%':
        echo $nb1 % $nb2 . "\n"; 
        break ;
    default:
        break ;
    }
    return (TRUE);
}

function is_operator($char_check)
{
    $pos = strpos("%/*+-", $char_check);
    if ($pos === FALSE)
        return (FALSE);
    return (TRUE);
}



if ($argc != 2) {
    error();
}

$onespace = trim(ereg_replace("([ ]+)", " ", $argv[1]));
$check_arr = explode(" ", $onespace);
$nbrelem = count($check_arr);
if ($nbrelem > 3 || $nbrelem == 0){
    error();
}
if ($nbrelem == 3)
{
    if (is_numeric($check_arr[0]) && is_numeric($check_arr[2]))
        do_op($check_arr[1], $check_arr[0], $check_arr[2]);
    else
        error();
    return (true);
}
else if ($nbrelem == 2)
{
    $char_check = $check_arr[0][strlen($check_arr[0]) - 1];
    $char_check2 = $check_arr[1][0];
    if ((is_operator($char_check) === TRUE) && (is_operator($char_check2) === FALSE))
    {
        $nb1 = substr($check_arr[0], 0, -1);
        if (is_numeric($nb1) && is_numeric($check_arr[1]))
            do_op($char_check, $nb1, $check_arr[1]);
        else
            error();
        return (true);
    }
    else if ((is_operator($char_check2) === TRUE) && (is_operator($char_check) === FALSE))
    {
        $nb2 = substr($check_arr[1], 1);
        if (is_numeric($check_arr[0]) && is_numeric($nb2))
            do_op($char_check2, $check_arr[0], $nb2);
        else
            error();
        return (true);
    }
    else
        error();
}
else
{
    $i = 0;
    $op_arr = ['%', '/', '*', '+', '-'];
    $len = strlen($check_arr[0]);
    while ($i < 5)
    {
        $u = 1;
        $pos = 0;
        while ($u < $len)
        {
            $u++;
            if ($check_arr[0][$u] == $op_arr[$i]){
                $pos = $u;
                $substr[0] = substr($check_arr[0], 0, $pos);
                $substr[1] = substr($check_arr[0], $pos + 1);
                if (is_numeric($substr[0]) && is_numeric($substr[1])){
                    do_op($op_arr[$i], $substr[0], $substr[1]);
                    return (TRUE);
                }
            }
        }
        $i++;
    }
    error();
}
?>