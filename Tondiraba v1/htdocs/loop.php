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
//$NeMassiv=123;
$array['courseName']='Veeb';
//echo $array['courseName'];
//$array['room']='327';
//$array['dateStart']='17:40';
//$array['dateEnd']='19:10';
$array['courseName']='3D';
//echo "<br>";
//echo $array['courseName'];

//$array['students']=[
//	'maksim','Vitalik','Slava','Egor'
//];

$x=1;
//foreach ($array as $key =>$value){
//	if(!is_array($value)){
//		echo "KEY:".$key.", VALUE:".$value."<br>";
//	}else {
//		continue;
//	}
//	echo $x."<br>";
//	$x++;
//}

//for($i=1;$i<=$i_nr;$i++){
// //   echo "<b>".$i."</b><br>";
//    for($x=1;$x<=$x_nr;$x++){
//
//        echo $i*$x.'<br>';
//    }
//}

//$students=[
//	9=>'maksim',
//	'Ilja',
//	4=>'Kirill',
//	'Anita',
//	'Karl',
//	1=>'Vika',
//	'Marat'
//];
//var_dump($students);
//for ($x=0;$x<=array_key_last($students);$x++) {
//	echo "KEY:".$x.", VALUE:".$students[$x]."<br>";
//}




for($i=0;$i<=3;$i++)
{
		for($y=0;$y<=$i;$y++) {
			echo "*";
		}

//	//echo "i=".$i.'::::'.$i%2 .'::::' ;
//	if($i % 2) {
//	//	echo $i;
//	}else{
//		echo $i;
//	}
	echo "<br>";
}




echo "\n<br> end file";






