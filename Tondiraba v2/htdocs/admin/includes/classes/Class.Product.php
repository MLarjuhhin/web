<?php
Class Product{

	public static function getProductList(MySQL $DB){
		$product=$DB->AllRows("SELECT * FROM product where date_delete is null");

		return $product;
	}
	public static function getProductByID(MySQL $DB,$id=false,$row=false){
		if(empty($id)){
			return false;
		}else{
			$data=$DB->FQuery("SELECT * FROM product where id=?",[$id]);

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
		$defaults = $DB->AllRows("SHOW COLUMNS FROM product");

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
			$res=$DB->Insert('product',$insert_data);
			$id=$DB->getInsertID();
		}else{
			$res=$DB->Update('product',$insert_data,' where id='.$data['id']);
		}

		if($res){
			return ($id)?$id:true;
		}else{
			return false;
		}

	}



}