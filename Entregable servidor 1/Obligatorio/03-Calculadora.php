<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
    <?php
        $a = isset($_GET["a"])?$_GET["a"]:20;
        $b = isset($_GET["b"])?$_GET["b"]:4;

        function resta(){
            global $a,$b;
            return $a-$b;
        }

        function multiplicacion($num1,$num2){
            return $num1*$num2;
        }
        require "./exports/division.php";
        require "./exports/module.php";
    ?>

</head>
<body>
    <table style="text-align: left;">
        <tr>
            <th>Suma</th>
            <td><?php echo $a." + ".$b?></td>
            <td><?php echo $a+$b?></td>
        </tr>
        <tr>
            <th>Resta</th>
            <td><?php echo $a." - ".$b;?></td>
            <td><?php echo resta()?></td>
        </tr>
        <tr>
            <th>Multiplicación</th>
            <td><?php echo $a." * ".$b;?></td>
            <td><?php echo multiplicacion($a,$b);?></td>
        </tr>
        <tr>
            <th>División</th>
            <td><?php echo $a." / ".$b;?></td>
            <td><?php echo division($a,$b);?></td>
        </tr>
        <tr>
            <th>Módulo</th>
            <td><?php echo $a." % ".$b;?></td>
            <td><?php echo module($a,$b);?></td>
        </tr>
    </table>
</body>
</html>