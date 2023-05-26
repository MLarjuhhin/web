<?php

if(!empty($_POST)){
	if($_POST['act']=='add_subscribe'){
		$subscribe=new Subscribe($DB,$_POST['email'],false);
		$subscribe
			->validate()
			->issetEmail()
			->save();
		if ($subscribe->error) {
			$data['error']=$subscribe->error;
		}else{
			$data['success']=text('ok');
		}
	}

	if($_POST['act']=='subscribe_with_coupons'){
		$subscribe=new Subscribe($DB,$_POST['email'],true);
		$subscribe
			->validate()
			->issetEmail()
			->save();
		if ($subscribe->error) {
			$data['error']=$subscribe->error;
		}else{
			$data['success']=text('ok_2');
		}
	}

}