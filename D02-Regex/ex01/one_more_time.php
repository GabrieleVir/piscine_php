#!/usr/bin/php
<?php
	date_default_timezone_set('Europe/Brussels');
	
	$day_arr = 
	[
		"Lundi" => 1,
		"Mardi" => 2,
		"Mercredi" => 3,
		"Jeudi" => 4,
		"Vendredi" => 5,
		"Samedi" => 6,
		"Dimanche" => 7
	];

	$month_arr =
	[
		"Janvier" => 1,
		"Février" => 2,
		"Mars" => 3,
		"Avril" => 4,
		"Mai" => 5,
		"Juin" => 6,
		"Juillet" => 7,
		"Août" => 8,
		"Septembre" => 9,
		"Octobre" => 10,
		"Novembre" => 11,
		"Décembre" => 12
	];

	$response = [];

	function is_digit($str)
	{
		$i = 0;
		while ($i < strlen($str))
		{
			if (ord($str[$i]) < 48 || ord($str[$i]) > 57)
				return (false);
			$i++;
		}
		return (true);
	}

	function verif_date($arg_date)
	{
		global $day_arr, $month_arr, $response;

		if (array_key_exists(ucfirst($arg_date[0]), $day_arr) && array_key_exists(ucfirst($arg_date[2]), $month_arr)){
			$response["month"] = (int)$month_arr[$arg_date[2]];
		}
		else
			return (0);
		if (is_digit($arg_date[1]) === false || strlen($arg_date[1]) > 2)
			return (0);
		$day = (int)$arg_date[1];
		if ($day <= 0 || $day > 31)
			return (0);
		$response["day"] = $day;
		if (is_digit($arg_date[3]) === false)
			return (0);
		$year = (int)$arg_date[3];
		if ($year < 1000 || strlen((string)$arg_date[3]) != 4)
			return (0);
		$response["year"] = $year;
		return (1);
	}

	function verif_hour($arg_time)
	{
		global $response;

		$response_key = ["hours", "minutes", "seconds"];
		$arr_time = explode(":", $arg_time);
		$i = 0;
		if (count($arr_time) != 3)
			return (0);
		while ($i < 3)
		{
			if (strlen((string)$arr_time[$i]) == 2)
			{
				if (is_digit($arr_time[$i]) === false)
					return (0);
				$tmp = (int)$arr_time[$i];
				if ($i == 0 && ($tmp > 23 || $tmp < 0))
					return (0);
				else if ($tmp > 59 || $tmp < 0)
					return (0);
				else
					$response[$response_key[$i]] = $tmp;
			}
			else
				return (0);
			$i++;
		}
		return (1);
	}

	if ($argc != 2)
		exit ;
	$arg_arr = explode(" ", $argv[1]);
	if (count($arg_arr) == 5 && verif_date($arg_arr) && verif_hour($arg_arr[4]))
	{
		echo mktime($response["hours"], $response["minutes"], $response["seconds"], (int)$response["month"], (int)$response["day"], (int)$response["year"]) . "\n";
		return (0);
	}
	else
		echo "Wrong Format\n";
	return (1);
?>