<?php

if(empty($modulePage1)) {
	$Query = $DB->AllRows("SELECT * FROM testimonial where date_delete is null ");
}elseif($modulePage1=='add' && empty($modulePage2)){

if(!empty($_POST)){
	$_POST['manager_id']=$_SESSION['manager_id'];
	$res=Testimonial::save($DB,$_POST);

	if($res){
		$_SESSION['success']='ok';
		refreshPage('/'.$modulePage0);
	}else{
		$_SESSION['error']='error';
		refreshPage();
	}
}
}elseif($modulePage1=='edit' && is_numeric($modulePage2)){
	$Update = $DB->FQuery("SELECT * FROM testimonial where id=?",[$modulePage2]);
	//TODO: refresh if empty
}elseif($modulePage1=='delete' && is_numeric($modulePage2)){
	dd('delete');
}


