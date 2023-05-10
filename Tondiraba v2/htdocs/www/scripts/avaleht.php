<?php
if(!empty($_POST)){
	if($_POST['act']=='add_subscribe'){
		if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$add_data=[
				'email'=>$_POST['email'],
				'date_add'=>$DB->time(),
			];
			$add_email=$DB->Insert('subscribe',$add_data);
			if($add_data){
				$_SESSION['success']='ok';
			}else{
				$_SESSION['error']='error';
			}
		}else{
			$_SESSION['error']=text('invalid_email');
		}
	}

}