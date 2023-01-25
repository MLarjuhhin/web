<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'includes/common.php';
require_once('includes/session.php');

$data = [];
$data['error'] = [];
$data['success'] = [];

if (!empty($_SESSION['error'])) {
	$data['error'] = $_SESSION['error'];
	unset($_SESSION['error']);
	//unset($_SESSION['success']);
} elseif (!empty($_SESSION['success'])) {
	$data['success'] = $_SESSION['success'];
	//unset($_SESSION['error']);
	unset($_SESSION['success']);
}
echo $aasdasdas;


