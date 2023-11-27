<?php
include_once("Cuenta.php");

function booleanToString(bool $bool)
{
    return $bool ? "true" : "false";
}

$cuentaPaco = new Cuenta("Paco", "0001", 8, 2000);
$cuentaMaria = new Cuenta("Maria", "0002", 4, 5000);

echo "Saldo Paco: " . $cuentaPaco->saldo . "<br>";

echo "Saldo Maria: " . $cuentaMaria->saldo . "<br>";

echo "Ingreso a Paco de 500. Satisfactorio:" . booleanToString($cuentaPaco->ingreso(500)) . "<br>";

echo "Reintegro a Paco de 3000. Satisfactorio:" . booleanToString($cuentaPaco->reintegro(3000)) . "<br>";

echo "Ingreso a Maria de -400. Satisfactorio:" . booleanToString($cuentaMaria->ingreso(-400)) . "<br>";

echo "Reintegro a Maria de 500. Satisfactorio:" . booleanToString($cuentaMaria->reintegro(500)) . "<br>";

echo "Saldo Paco: " . $cuentaPaco->saldo . "<br>";

echo "Saldo Maria: " . $cuentaMaria->saldo . "<br>";

echo "Transferencia de Maria a Paco de 300. Satisfactorio:" . booleanToString($cuentaMaria->transferencia($cuentaPaco, 300)) . "<br>";

echo "Saldo Paco: " . $cuentaPaco->saldo . "<br>";

echo "Saldo Maria: " . $cuentaMaria->saldo . "<br>";

echo "Transferencia de Paco a María de 3000. Satisfactorio:" . booleanToString($cuentaPaco->transferencia($cuentaMaria, 3000)) . "<br>";

echo "Saldo Paco: " . $cuentaPaco->saldo . "<br>";

echo "Saldo Maria: " . $cuentaMaria->saldo . "<br>";

?>