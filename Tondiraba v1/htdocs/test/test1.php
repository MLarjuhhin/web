<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$symbol='eee';
$x=3;
$y=2;

switch($symbol){
	case 'minus':
		echo $x."-".$y."= ".($x-$y);
		$selected=$symbol;
		break;
	case 'plus':
		echo $x."+".$y."= ".($x+$y);
		$selected=$symbol;
		break;
	case 'division':
		echo $x."/".$y."= ".$x/$y;
		$selected=$symbol;
		break;
	case 'multiplication':
		echo  $x."*".$y."= ".$x*$y;
		$selected=$symbol;
		break;
}

var_dump($selected);
