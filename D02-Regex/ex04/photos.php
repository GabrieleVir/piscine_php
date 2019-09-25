#!/usr/bin/php
<?php

function manage_curl($url)
{
	$request = curl_init();
	if ($request === FALSE)
		exit();
	curl_setopt_array($request, array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_FOLLOWLOCATION => TRUE,
	));
	$response = curl_exec($request);
	curl_close($request);
	return($response);
}

function format($img_url, $url)
{
	if ($img_url[0] == "/")
		return ($url . $img_url);
	else
		return $img_url;
}

function curl_get_image($img_url)
{
	$curl = curl_init();
	curl_setopt_array($curl, array(
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_URL => $img_url,
		CURLOPT_FOLLOWLOCATION => true,
		CURLOPT_CONNECTTIMEOUT => 5
	));
	$img_source = curl_exec($curl);
	curl_close($curl);
	return $img_source;
}

if ($argc !== 2 || $argv[1] === "")
	exit();
$response = manage_curl($argv[1]);
$array_of_img = array();
preg_match_all('/<(?:IMG|img).*?src="(.*?)"/', $response, $array_of_img);
$folder = str_replace(array("http://", "https://"), "", $argv[1]);
if (file_exists($folder) == FALSE)
	mkdir($folder, 0755, TRUE);
foreach ($array_of_img[1] as $img_url) {
	$img_url = format($img_url, $argv[1]);
	$img_data = curl_get_image($img_url);
	if ($img_data == FALSE) {
		$file_name = substr($img_url, strrpos($img_url, '/') + 1);
		if (file_exists("$folder/$file_name") == FALSE) {
			$img_fd = fopen("$folder/$file_name", 'x');
			fwrite($img_fd, $img_data);
			fclose($img_fd);
	
		}
	}
}
?>