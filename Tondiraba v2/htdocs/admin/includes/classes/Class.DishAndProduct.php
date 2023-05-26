<?php

class DishAndProduct
{
	public static function getDishAndProductForSelect(MySQL $DB, $id)
	{
		$dishProduct = $DB->AllRows("SELECT * FROM dish_and_product WHERE dish_id=? and date_delete is null", [$id]);
		foreach ($dishProduct as $v){
			$data[]=$v['product_id'];
		}
		$implode_data=json_encode($data);
		return $implode_data;
	}

	public static function save(MySQL $DB, $dish_id, $product = false)
	{
		$old_data = $DB->AllRows("SELECT * FROM dish_and_product WHERE dish_id=? and date_delete is null", [$dish_id]);
		// удаляем старые записи
		foreach ($old_data as $v) {
			if(in_array($v['product_id'],$product)){
				//находим ключ
				$key=array_search($v['product_id'],$product);
				//удаляем те значения которые не изменились
				unset($product[$key]);
				continue;
			}
			$DB->Update("dish_and_product", ['date_delete' => $DB->time()], ' where id='.$v['id']);
		}
		// добавляем новые

		//проверка что $product массив
		if (is_array($product)) {
			$DB->StartTransaction();
			foreach ($product as $v) {
				$save = [
					'dish_id' => $dish_id,
					'product_id' => $v,
					'date_add' => $DB->time(),
				];
				$res = $DB->Insert('dish_and_product', $save);
				if (!$res) {
					$DB->RollBack();
					return false;
				}
			}
			$DB->Commit();
		} else {
			return false;
		}
	}

	public static  function getProductsForDish($DB,$id){
		$product=self::getDishAndProductForSelect($DB,$id);
		$products=json_decode($product,true);

		foreach ($products as $k=>$v){
			$Query=$DB->Fquery("SELECT * FROM product where id=?",[$v]);
			$ret[]=$Query['name'];
		}

		return implode(',',$ret);
	}
}