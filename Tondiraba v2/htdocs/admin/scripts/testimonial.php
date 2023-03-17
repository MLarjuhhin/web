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
	if (empty($Update)) {

		$_SESSION['error']='ура!!!! такой ид НЕТ!!!!';
		refreshPage('/'.$modulePage0);
	}


	if(!empty($_POST)){

		$_POST['date_edit']=$DB->time();
		$_POST['id']=$modulePage2;

		$res=Testimonial::save($DB,$_POST);
		if($res){
			$_SESSION['success']='ok';
		}else{
			$_SESSION['error']='error';
		}
		refreshPage();
	}
}elseif($modulePage1=='delete' && is_numeric($modulePage2)){
	$delete_date=['id'=>$modulePage2,'date_delete'=>$DB->time()];
	$res=Testimonial::save($DB,$delete_date);

	if($res){
		$_SESSION['success']='ok';
	}else{
		$_SESSION['error']='error';
	}
	refreshPage('/'.$modulePage0);

}else{
	$_SESSION['error']='Page not found!+)';
	refreshPage('/');
}


