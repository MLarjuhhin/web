<?php

if ($modulePage2 == 'add' || ($modulePage2 == 'edit' && is_numeric($modulePage3)) || ($modulePage2 == 'delete' && is_numeric($modulePage3))) {

	$url = false;
	//SELECT
	$Update = ListDishes::getDishByID($DB, $modulePage3);
	//$POST
	if ($_POST['act'] == 'add_dish' || $_POST['act'] == 'edit_dish' || $_POST['act'] == 'delete_dish') {
		$dish_data = [
			'name' => $_POST['name_dish'],
			'price' => $_POST['price_dish'],
		];
		if ($_POST['act'] == 'add_dish') {
			$dish_data['date_add'] = $DB->time();
			$url = '/'.$modulePage0."/".$modulePage1;
		} elseif ($_POST['act'] == 'edit_dish') {
			$dish_data['id'] = $modulePage3;
			$dish_data['date_edit'] = $DB->time();
		} elseif ($_POST['act'] == 'delete_dish') {

			$dish_data['date_delete'] = $DB->time();
			$dish_data['id'] = $modulePage3;
			$url = '/'.$modulePage0."/".$modulePage1;
		}
		if (ListDishes::save($DB, $dish_data)) {
			$_SESSION['success'] = 'ok';
		} else {
			$_SESSION['error'] = 'error';
		}
		refreshPage($url);
	}
}
