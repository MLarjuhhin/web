<?php
if($modulePage2=='add' || ($modulePage2=='edit' && is_numeric($modulePage3))){
	$url=false;
	//SELECT

		$Update = Category::getCategoryByID($DB,$modulePage3);

	//$POST
	if($_POST['act']=='add_category' || $_POST['act']=='edit_category') {
		$category_data = [
			'name' => $_POST['name_category'],
		];
		if ($_POST['act'] == 'add_category') {
			$category_data['date_add'] = $DB->time();

			$url='/'.$modulePage0."/".$modulePage1;

		} elseif ($_POST['act'] == 'edit_category') {
			$category_data['id'] = $modulePage3;
			$category_data['edit_add'] = $DB->time();
		}

		if (Category::save($DB, $category_data)) {
			$_SESSION['success'] = 'ok';
		} else {
			//mail('infojuht@tondiraba.edu.com','category_add_error',print_r([$_POST,$_SESSION,$category_data],true));
			$_SESSION['error'] = 'error';
		}

		refreshPage($url);
	}




}elseif($modulePage2=='delete'){

}