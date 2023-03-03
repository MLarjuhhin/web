<?php

Class Testimonial{

	public static function save(MySQL $DB,$data=false){
		$defaults = $DB->AllRows("SHOW COLUMNS FROM testimonial");

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
			$res=$DB->Insert('testimonial',$insert_data);
			$id=$DB->getInsertID();
		}

		if($res){
			return ($id)?$id:true;
		}else{
			return false;
		}
	}
}