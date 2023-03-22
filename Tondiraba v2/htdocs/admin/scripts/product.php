<?php

if ($modulePage2 == 'add' || ($modulePage2 == 'edit' && is_numeric($modulePage3))) {
	$url = false;
	//SELECT
	$Update = Product::getProductByID($DB, $modulePage3);
	//$POST
	if ($_POST['act'] == 'add_product' || $_POST['act'] == 'edit_product') {
		$product_data = [
			'name' => $_POST['name_product'],
		];
		if ($_POST['act'] == 'add_product') {
			$product_data['date_add'] = $DB->time();

			$url = '/'.$modulePage0."/".$modulePage1;

		} elseif ($_POST['act'] == 'edit_product') {
			$product_data['id'] = $modulePage3;
			$product_data['date_edit'] = $DB->time();
		}
		if (Product::save($DB, $product_data)) {
			$_SESSION['success'] = 'ok';
		} else {
			//mail('infojuht@tondiraba.edu.com','product_add_error',print_r([$_POST,$_SESSION,$product_data],true));
			$_SESSION['error'] = 'error';
		}
		refreshPage($url);
	}
} elseif ($modulePage2 == 'delete' && is_numeric($modulePage3)) {
	$product_data['date_delete'] = $DB->time();
	$product_data['id'] = $modulePage3;

	$url = '/'.$modulePage0."/".$modulePage1;

	if (Product::save($DB, $product_data)) {
		$_SESSION['success'] = 'ok';
	} else {
		//mail('infojuht@tondiraba.edu.com','product_add_error',print_r([$_POST,$_SESSION,$product_data],true));
		$_SESSION['error'] = 'error';
	}

	refreshPage($url);


}

