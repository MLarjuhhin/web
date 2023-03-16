<?php
Class Category{

	public static function getCategoryList(MySQL $DB){
		$category=$DB->AllRows("SELECT * FROM category where date_delete is null");

		return $category;
	}
	public static function getCategoryByID(MySQL $DB,$id,$row=false){

	}
	public static function save(MySQL $DB,$data){
		$defaults = $DB->AllRows("SHOW COLUMNS FROM category");

		foreach ($defaults as $colums) {
			$col[] = $colums['Field'];
		}

		foreach ($data as $k => $v) {
			if ($k == 'id') {
				continue;
			}
			if (!in_array($k, $col)) {
				continue;
			}
			$insert_data[$k] = empty($v) ? 0 : $v;
		}

		if(!isset($data['id'])){
			$insert_data['date_add']=$DB->time();
			$res=$DB->Insert('category',$insert_data);
			$id=$DB->getInsertID();
		}else{
			$res=$DB->Update('category',$insert_data,' where id='.$data['id']);
		}

		if($res){
			return ($id)?$id:true;
		}else{
			return false;
		}

	}



}