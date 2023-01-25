<?php
date_default_timezone_set('Europe/Tallinn');

require_once dirname(__FILE__) . '/config.php';


ini_set('display_errors', 0);
ini_set('error_reporting', E_ALL);
ini_set('log_errors', 1);

ini_set('error_log', $conf['log_dir'] . '/php-error-' . date("Y-m-d") . '.log');


?>