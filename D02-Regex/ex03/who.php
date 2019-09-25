#!/usr/bin/php
<?php
	date_default_timezone_set("Europe/Brussels");
	$file = fopen("/var/run/utmpx", "rb");
	fseek($file, hexdec("4e8"));
	while (!feof($file))
	{
		$data = fread($file, 628);
		if (strlen($data) == 628)
		{
			$data = unpack("a256user/a4id/a32line/ipid/itype/ltime", $data);
			if ($data["type"] == 7)
			{
				echo $data["user"]. "   ";
				echo $data["line"] . "  ";
				$time = date("M j H:i ", $data["time"]);
				echo $time . "\n";
			}
		}
	}
?>