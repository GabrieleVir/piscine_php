#!/usr/bin/php
<?php

	function upper_case($arr_match)
	{
		$uppercased = strtoupper($arr_match[1]);
		$concat = str_replace($arr_match[1], $uppercased, $arr_match[0]);
		return ($concat);
	}
	if ($argc < 2 || !file_exists($argv[1]))
		exit();
	$read = fopen($argv[1], 'r');
	$page = "";
    while ($read && !feof($read)) {
        $page .= fgets($read);
    }
	$page = preg_replace_callback("/<a.*?>(.*?)</s", "upper_case", $page);
	$page = preg_replace_callback('/<a.*?>.*title="(.*?)"/s', "upper_case", $page);
	$page = preg_replace_callback('/<a.*?title="(.*?)"/s', "upper_case", $page);
	echo $page;
?>