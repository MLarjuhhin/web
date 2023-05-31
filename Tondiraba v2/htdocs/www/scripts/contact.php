<?php
if(isset($_POST['sendMessageButton'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];

	if(!empty($name)&&!empty($email)&&!empty($subject) && !empty($message)){
		$error=[];
		if(strlen($name)>22){
			$error[]='Максимальное в имени может быть 22 символа';
		}
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error[]='Е-мейл не верный';
		}
		if(strlen($subject)>50){
			$error[]='Максимальное в теме может быть 50 символа';
		}
		if(strlen($message)>250){
			$error[]='Максимальное в сообщение может быть 250 символа';
		}

		if(!empty($error)){
			$data['error']=$error;
		}else{

				$msg=' Новое сообщение с сайта! <br>';
				$msg.='Имя: '.$name.'<br>';
				$msg.='Email: '.$email.'<br>';
				$msg.='Тема: '.$subject.'<br>';
				$msg.='сообщение: '.$message.'<br>';

				$res=mail('larjuhhin@gmail.com','Новое сообщение с сайта!',$msg);

				if($res){
					$data['success']='ok';
				}else{
					$data['error']='сообзение не отправленно';
				}
		}

	}else{
		$data['error']='Все поля должны быть заполнены';


	}

}