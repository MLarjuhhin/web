<?php
function print_rf($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}
function dd($data){
	print_rf($data);
	exit();
}

function refreshPage($url = false)
{
	if (!$url) {
		$url = $_SERVER['REQUEST_URI'];
	}
	header("Location: ".$url);
	exit;
}
function showArray($d)
{
	if (is_array($d)) {
		foreach ($d as $k => $v) {
			showArray($v);
		}
	}else {
		print $d."<br />";
	}
}