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
		}else{
			$res=$DB->Update('testimonial',$insert_data,' where id='.$data['id']);
		}

		if($res){
			return ($id)?$id:true;
		}else{
			return false;
		}
	}


	public static function WWW_get_testimonial_list(MySQL $DB){
		$rowArray=['name','profession','description','img_id'];
		$row=implode(',',$rowArray);
		$data=$DB->AllRows("SELECT $row FROM testimonial where date_delete is null");

		return $data;
	}
}

















