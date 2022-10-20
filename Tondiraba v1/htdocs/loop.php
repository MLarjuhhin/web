<?php
/**
 * FOR
 */
//$i_nr=3;
//$x_nr=9;
//
//
//for($i=1;$i<=$i_nr;$i++){
// //   echo "<b>".$i."</b><br>";
//    for($x=1;$x<=$x_nr;$x++){
//
//        echo $i*$x.'<br>';
//    }
//}








/**
 * FOREACH
 */
//$array['one']=1;
//$array['two']=10;
//формарую массив данных по школе
$array=[
	'teacher'=>[
		"Maksim"=>[
			'email'=>'infojuht@tondiraba.edu.ee',
			'phone'=>'53419023',
		],
		'Vika'],
	'maxUserCount'=>15
];

$array['courseName']='Veeb';
$array['room']='327';
$array['dateStart']='17:40';
$array['dateEnd']='19:10';
$array['students']=[
	'maksim','Vitalik','Slava','Egor'
];

foreach ($array as $key =>$value){
	if(!is_array($value)){
		echo "KEY:".$key.", VALUE:".$value."<br>";
	}else {
		continue;
//		echo "KEY:".$key.":<br>";
//		foreach ($value as $v) {
//			echo $v."<br>";
//		}
	}
}
echo "\n end file";






