<?php
$category=$DB->AllRows("SELECT *  FROM category WHERE date_delete is null");

foreach ($category as $k=>$c){
	// $c['id'] = id category
		$dishQuery=$DB->AllRows("SELECT id,name,price FROM dish where category_id=? and date_delete is null ",[$c['id']]);
		if(!empty($dishQuery)){
			$dish[$c['id']]=$dishQuery;
		}
}
