<?php
var_dump($_POST);
if(!empty($_POST) ){

    echo "<br><hr><br>";
    $x=$_POST['a'];
    $y=$_POST["b"];
        if(!empty($x) && !empty($y)){
            if(is_numeric($x) && is_numeric($y)){
                echo "<br>";
                echo $x."+".$y."= ".($x+$y);   
                    echo "<br>";
                echo $x."-".$y."= ".($x-$y);
                    echo "<br>";
                echo $x."*".$y."= ".$x*$y;
                    echo "<br>";
                echo $x."/".$y."= ".$x/$y;
            }elseif(!is_numeric($x) &&  !is_numeric($y)){
                echo "Полe Y и Х не должно содержать буквы";  
            }elseif(!is_numeric($x)){
                echo "Полe X не должно содержать буквы";   
            }elseif(!is_numeric($y)){
                echo "Полe Y не должно содержать буквы";   
            }elseif(!is_numeric($x) &&  !is_numeric($y)){
                echo "Полe Y и Х не должно содержать буквы";  
            }
            else{
                echo "Поля не должны содержать буквы";   
            }
        }else{
            echo "Поля не должны быт пустыми";
        }
}else{
    echo "Пост пуст";
}
?>
<br>
<html>
    <body>
<form method="POST" action="">
        <input type="text" name="a" value="<?=$x?>">
        <select name='select'>
            <option value="non"></option>  
            <option value="plus">+</option>
            <option value="minus">-</option>
            <option value="division">/</option>
            <option value="multiplication">*</option>    
        </select>
        <input type="text" name="b" value="<?=$y?>">
        <input type="submit">
</form>
    </body>
</html>
