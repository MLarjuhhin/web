<?php

var_dump($_POST);

if(!empty($_POST)){

    echo "<br><hr><br>";
    $x=$_POST['a'];
    $y=$_POST["b"];

    var_dump($x,$y);

    echo "<br>";
    echo $x."+".$y."= ".($x+$y);   
        echo "<br>";
    echo $x."-".$y."= ".($x-$y);
        echo "<br>";
    echo $x."*".$y."= ".$x*$y;
        echo "<br>";
    echo $x."/".$y."= ".$x/$y;
}else{
    echo "Пост пустой";
}
?>
<br>
<html>
    <body>
<form method="POST" action="">
        <input type="text" name="a" value='1'>
        <input type="text" name="b" value='3'>
        <input type="submit">
</form>
    </body>
</html>
