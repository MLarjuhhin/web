<?php
Class Manager{
	/**
	 * Получить данные менеджера сайта по ИД
	 *
	 * @param  MySQL  $DB
	 * @param $id
	 * @param $row=false, вернет только данное поле
	 *
	 */
	public static function getManagerByID(MySQL $DB,$id,$row=false){

		$manager=$DB->FQuery("SELECT * FROM manager where id=?",[$id]);
		if(!empty($manager)){
			if($row){
				return $manager[$row];
			}else{
				return $manager;
			}
		}else{
			return false;
		}
	}




}