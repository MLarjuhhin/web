<?php
Class ListDishes{

	public static function getList(MySQL $DB){
		$getData=$DB->AllRows("SELECT * FROM dish where date_delete is null");

		if(!empty($getData)){
			return $getData;
			}else{
				return [];
			}
	}

	public static function getDishByID(MySQL $DB,$id=false,$row=false){
		if(empty($id)){
			return false;
		}else{
			$data=$DB->FQuery("SELECT * FROM dish where id=?",[$id]);

			if(!empty($data)){
				if ($row){
					return $data[$row];
				}else{
					return $data;
				}
			}else{
				return false;
			}
		}
	}
	public static function save(MySQL $DB,$data){
		$defaults = $DB->AllRows("SHOW COLUMNS FROM dish");

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
			$res=$DB->Insert('dish',$insert_data);
			$id=$DB->getInsertID();
		}else{
			$res=$DB->Update('dish',$insert_data,' where id='.$data['id']);
		}

		if($res){
			return ($id)?$id:true;
		}else{
			return false;
		}

	}

}