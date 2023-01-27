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
$reqInfo = parse_url($_SERVER['REQUEST_URI']);
var_dump($reqInfo);
if (is_array($reqInfo)) {
	@list($dummy, $modulePage0, $modulePage1, $modulePage2, $modulePage3, $modulePage4, $modulePage5) = explode("/",
		$reqInfo['path'], 6);
	$CHECK['modulePage'][]=$modulePage0 = preg_replace("/(\.html.*)$/i", "", $modulePage0);
	$CHECK['modulePage'][]=$modulePage1 = preg_replace("/(\.html.*)$/i", "", $modulePage1);
	$CHECK['modulePage'][]=$modulePage2 = preg_replace("/(\.html.*)$/i", "", $modulePage2);
	$CHECK['modulePage'][]=$modulePage3 = preg_replace("/(\.html.*)$/i", "", $modulePage3);
	$CHECK['modulePage'][]=$modulePage4 = preg_replace("/(\.html.*)$/i", "", $modulePage4);
	$CHECK['modulePage'][]=$modulePage5 = preg_replace("/(\.html.*)$/i", "", $modulePage5);

} else {
	$modulePage0 = "";
	$modulePage1 = null;
}

$include = $modulePage0;

if (!empty($include) && file_exists('scripts/'.$include.'.php')) {
	require_once('scripts/'.$include.'.php');
}

// inner design -> tpl
if (!empty($include) && file_exists('tpl/'.$include.'_tpl.php')) {
	ob_start();
	require_once('tpl/'.$include.'_tpl.php');
	$data['body'] = ob_get_contents();
	ob_end_clean();
}


ob_start();
include('tpl/index_tpl.php');
$data['body'] = ob_get_contents();
ob_end_clean();


echo(trim($data['body']));





