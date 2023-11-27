<?php


$num1 = isset($_GET["primer"])?$_GET["primer"]:0;
$num2 = isset($_GET["segundo"])?$_GET["segundo"]:0;

if (!(isset($_GET["primer"]) && isset($_GET["segundo"]))){
    echo "Introduce ambos numeros";
}

function mayor(){
    global $num1, $num2;
    echo $num1>$num2?"El número ".$num1." es mayor que el número ".$num2 : "El número ".$num2." es mayor que el número ".$num1;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
        <input type="number" name="primer" value="0"/>
        <input type="number" name="segundo" value="0"/>
        <input type="submit" value="submit"/>
    </form>
    <?php mayor()?>
</body>
</html>