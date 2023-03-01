<?php
date_default_timezone_set('Europe/Tallinn');

require_once dirname(__FILE__) . '/config.php';

require_once dirname(__FILE__) . '/functions.php';
spl_autoload_register(function ($class_name) {

	include "classes/Class." . $class_name . ".php";



});

ini_set('display_errors', 0);
ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);

ini_set('error_log', $conf['log_dir'] . '/php-error-' . date("Y-m-d") . '.log');
$db_config ["host"] = "mysqldb";
$db_config ["user"] = "main";
$db_config ["pass"] = "root";
$db_config ["prefix"] = "";
$db_config ["type"] = "mysql";
$db_config  ["db"] = "koppee_db";

if ($db_config != "") $DB = new MySQL($db_config);

?>