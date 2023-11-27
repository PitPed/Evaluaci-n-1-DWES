<?php
$num = intval($_REQUEST["num"]);
echo is_integer($num) ? "El número " . $num . " es " . ($num % 2 == 1 ? "impar" : "par") : ("El valor 'num' debe ser un número entero");
?>