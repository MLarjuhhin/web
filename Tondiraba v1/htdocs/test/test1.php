<?php
include 'func.php';

// TODO Сделайте функцию, которая возвращает куб числа. Число передается параметром
if(!empty($_POST)){
	echo cube($_POST['a']);

}

function cube($num)
{
	$h = $num * $num * $num;
	return $h;
}



?>
<form method="POST">
	<input type="text" name="a">
	<input type="submit">
</form>


