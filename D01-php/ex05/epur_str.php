#!/usr/bin/php
<?php

    if ($argc != 2)
        exit ;
    $res = ereg_replace("([ ]+)", " ", trim($argv[1]));
    if ($res !== "")
        echo "$res\n";
?>