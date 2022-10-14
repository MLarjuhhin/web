<?php
var_dump($_POST);
if(!empty($_POST) ){

    echo "<br><hr><br>";
    $x=$_POST['a'];
    $y=$_POST["b"];
    $symbol=$_POST['select'];

        if(!empty($x) && !empty($y)  && $symbol!='non'){
            if(is_numeric($x) && is_numeric($y)){
                echo "<br>";
                    switch($symbol){
                        case 'minus':
                            echo $x."-".$y."= ".($x-$y);
                            break;
                        case 'plus':
                            echo $x."+".$y."= ".($x+$y);
                            break;
                        case 'division':
                            echo $x."/".$y."= ".$x/$y;
                            break;
                        case 'multiplication':
                            echo  $x."*".$y."= ".$x*$y;
                            break;
                    }

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
        <input type="text" name="a" value="<?=(isset($x))?$x:''?>">
        <select >
            <option value="non" ></option>  
            <option value="plus" <?=($symbol=='plus')?'selected':''?>>+</option>
            <option value="minus" <?=($symbol=='minus')?'selected':''?>>-</option>
            <option value="division" <?=($symbol=='division')?'selected':''?>>/</option>
            <option value="multiplication" <?=($symbol=='multiplication')?'selected':''?>>*</option>    
        </select>
        <input type="text" name="b" value="<?=(isset($y))?$y:''?>">
        <input type="submit">
</form>
    </body>
</html>
