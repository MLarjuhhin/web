<?php

if (!empty($_POST)) {
	$error = false;
	foreach ($_POST as $k => $v) {
		if (empty($v)) {
			$error[] = 'Внимание! Поле '.$k." пустое";
		}
	}

	if (!$error) {
		if (registration($_POST)) {
			$success = 'ok';
		} else {
			$error[] = "регистрация не удалась!=(";
		}
	}
}


?>
<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>


<div class="container">
    <div class="row">
        <div class="col-md-12">
			<? if (!empty($error)) {
				?>
                <div class="alert alert-danger"><?
				foreach ($error as $v) {
					?>
                    <li> <?= $v ?></li>
				<? }
				?></div><?
			}
			?>

            <form method="POST">

                <input type="text" name="login" class="form-control my-3" placeholder="Login">
                <input type="password" name="password" class="form-control my-3" placeholder="Password">
                <input type="text" name="email" class="form-control my-3" placeholder="E-mail">
                <input type="text" name="phone" class="form-control my-3" placeholder="Phone">
                <input type="submit" class="btn btn-success">

            </form>
        </div>
    </div>
</div>


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

function registration($data)
{
	$save_data = implode(';', $data);
	$filename = 'logs/registration.csv'; // создаем имя файла и указываем папку
	//сохраняем нового пользователя
	return file_put_contents($filename, $save_data."\n", FILE_APPEND);

}

?>

</body>
</html>



