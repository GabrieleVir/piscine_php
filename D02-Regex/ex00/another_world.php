#!/usr/bin/php
<?php
	if ($argc == 1)
		exit ;
	if ($argv[1] !== ""){
		$textnospaces = trim(preg_replace("/\s+/", " ", $argv[1]));
		echo "$textnospaces\n";
		return (0);
	}
	else
		exit ;
?>