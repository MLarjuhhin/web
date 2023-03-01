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