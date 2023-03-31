<?php
Class ListDishes{

	public static function getList(MySQL $DB){
		$getData=$DB->AllRows("SELECT * FROM dish");

		if(!empty($getData)){
			return $getData;
			}else{
				return [];
			}
	}
}