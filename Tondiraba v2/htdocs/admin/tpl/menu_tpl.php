<?php
if ($modulePage1 == 'category' ) {
	include_once 'category_tpl.php';
}elseif($modulePage1=='product'){
	include_once 'product_tpl.php';
}elseif ($modulePage1 == 'list_dishes') {
	include_once 'list_dishes_tpl.php';
}