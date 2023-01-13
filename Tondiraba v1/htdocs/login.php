<?php
if (!empty($_POST)) {
	write_log('attemps', $_POST);
	if (!empty($_POST['login']) && !empty($_POST['password'])) {
		$data = file('logs/registration.csv');
		foreach ($data as $str) {
			$arr = explode(';', trim($str));
			$arr = array_map('trim', $arr);
			if ($_POST['login'] == $arr[1] && $_POST['password'] == $arr[2]) {
				$success = 'ok';
				break;
			}
		}
	} else {
		$error = 'Надо заполнить поля логи и пароль';
	}

	echo " <br><br><br><br>";

}

if (!empty($error)) {
	echo $error;
}
?>


<?
if (!empty($success) && empty($error)) {
	echo $success;
} else {
	?>

    <form action="" method="POST">

        <input type="text" name="login">
        <input type="password" name="password">
        <input type="submit">

    </form>
	<?
} ?>


<?php

/**
 * Сохранение логов в папку для логов
 *
 * @param $filename
 * @param $data
 * @return void
 */
function write_log($filename, $data)
{
	if (!is_dir('logs')) {// провека есть ли папка для логов
		mkdir('logs');// если папки для логов нет, тогда ее создаем
	}
	$filename = 'logs/'.$filename.'_'.date('Y-m-d').'.log'; // создаем имя файла и указываем папку
	//сохраняем логи
	file_put_contents($filename, '['.date('H:i:s')."]\n".print_r($data, true), FILE_APPEND);
}


