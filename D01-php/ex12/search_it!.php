#!/usr/bin/php
<?php
	if ($argc == 1)
		exit ;
	$to_find = $argv[1];
	$arr = [];
	$i = $argc;
	while (--$i > 1)
	{
		$pos_exp_char = strpos($argv[$i], ":");
		$arr[0] = substr($argv[$i], 0, $pos_exp_char);
		$arr[1] = substr($argv[$i], $pos_exp_char + 1);
		if ($arr[0] == $to_find)
		{
			if ($arr[1] === false) {
				echo "(null)\n";
				return (0);
			}
			else {
				echo "$arr[1]\n";
				return (0);
			}
		}
	}
?>