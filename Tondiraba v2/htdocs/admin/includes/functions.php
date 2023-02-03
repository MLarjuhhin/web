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