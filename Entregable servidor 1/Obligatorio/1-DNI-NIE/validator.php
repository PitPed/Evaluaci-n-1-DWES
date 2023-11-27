<?php
const FORMULA_DNI = array(
    "T",
    "R",
    "W",
    "A",
    "G",
    "M",
    "Y",
    "F",
    "P",
    "D",
    "X",
    "B",
    "N",
    "J",
    "Z",
    "S",
    "Q",
    "V",
    "H",
    "L",
    "C",
    "K",
    "E"
);

const FORMULA_NIE = array(
    "X" => 0,
    "Y" => 1,
    "Z" => 2,
);

function comprobarDNI($DNI): bool
{
    if (!preg_match("/\d{8}[A-Z]{1}/i", $DNI)) {
        return false;
    }

    $num = intval(substr($DNI, 0, 8));

    if (strtolower(FORMULA_DNI[$num % 23]) != strtolower(substr($DNI, 8))) {
        return false;
    }
    return true;
}

function comprobarNIE($NIE): bool
{
    if (!preg_match("/[X-Z]{1}\d{7}/i", $NIE)) {
        return false;
    }

    $num = intval(FORMULA_NIE[substr($NIE, 0, 1)] . substr($NIE, 1, 7));
    if (strtolower(FORMULA_DNI[$num % 23]) != strtolower(substr($NIE, 8))) {
        return false;
    }
    return true;
}



$tipo = $_REQUEST["tipo"];
$numeroDocumento = $_REQUEST["numero-documento"];

if ($tipo == 'DNI')
    $response = comprobarDNI($numeroDocumento);
else
    $response = comprobarNIE($numeroDocumento);

echo "Formato " . ($response ? "correcto" : "incorrecto");

?>