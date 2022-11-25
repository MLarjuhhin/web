<?php
$e=10;
$g=5;
//объявляем функцию (получаем значение перменной)
function test($a,$b){
	//return $g;
	//объявляем новую переменную внутри фунции test
	$e=111;
	//echo выводит значение переменной $e
//	echo $e."<br>";
	$b=$a*10*$e;
	//return возвращает значение переменной $e
	return $b;
}
//echo test($e,1);
//Вызываем функцию(передаем значение переменный)


function NewTest($a,$b){


	//return $a.$b;
$q=1+2;
$w=15-3;

	if($q< $w){
		return "ok";
	}else{
		return "false";
	}
}

echo NewTest(13,6);





















