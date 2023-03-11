<?php
Class Category{

	public static function getCategoryList(MySQL $DB){
		$category=$DB->AllRows("SELECT * FROM category where date_delete is null");

		return $category;
	}
	public static function getCategoryByID(MySQL $DB,$id,$row=false){

	}
	public static function save(MySQL $DB,$data){

	}



}