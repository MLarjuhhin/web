<?php
if(!empty($_POST)){
	if($_POST['act']=='add_subscribe'){
		$subscribe=new Subscribe($DB,$_POST['email'],false);
		$subscribe->save();
		if ($subscribe->error) {
			$_SESSION['error']=$subscribe->error;
		}else{
			$_SESSION['success']=text('ok');
		}
	}

	if($_POST['act']=='subscribe_with_coupons'){

	}

}