<?php
Class Subscribe{

	public $error;
	public $email;
	public $coupons;
	public $DB;
	private $code_length=8;


	public function __construct(MySQL $DB,$email,$coupons=false)
	{
		$this->error=[];
		$this->email=$email;
		$this->DB=$DB;
		$this->coupons=$coupons;

		$this->validate();
		$this->getCouponsCode();

	}

	function validate(){
		if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
			$this->error[]='Ошибка валидации е-мейла';
		}
		return $this;
	}
	function save(){

		if(empty($this->error)){
			$add_data=[
				'email'=>$this->email,
				'date_add'=>$this->DB->time(),
			];

			if($this->coupons){
				$date_expired = date('Y-m-d H:i:s', strtotime(date('Y-m-d') . ' + 6 days'));
				$add_data_coupons=$add_data;
				$add_data_coupons['date_expired']=$date_expired;
				$add_data_coupons['code']=$this->coupons;

				$res1=$this->DB->Insert('coupons',$add_data_coupons);
				if(!$res1){
					$this->error[]='Не удалось сохранить в базу данных _coupons';
				}
			}
			$res=$this->DB->Insert('subscribe',$add_data);
			if(!$res){
				$this->error[]='Не удалось сохранить в базу данных';
			}
		}
		return $this;
	}
	private function getCouponsCode(){

			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
			$code = '';
			for ($i = 0; $i < $this->code_length; $i++) {
				$randomIndex = rand(0, strlen($characters) - 1);
				$code .= $characters[$randomIndex];
			}
			if($this->coupons){
				$this->coupons=$code;
			}else{
				$this->coupons=false;
			}
		}




}