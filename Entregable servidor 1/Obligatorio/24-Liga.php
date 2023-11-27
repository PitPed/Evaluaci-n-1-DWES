<?php
$aEquipos = array(
    "Real Madrid" => array("puntos" => 87, "posicion" => 1),
    "Villareal" => array("puntos" => 60, "posicion" => 5),
    "Celta de Vigo" => array("puntos" => 36, "posicion" => 17),
    "Ath. Bilbao" => array("puntos" => 51, "posicion" => 11),
    "RCD Espanyol" => array("puntos" => 25, "posicion" => 20),
    "Leganés" => array("puntos" => 33, "posicion" => 18),
    "Atlético de Madrid" => array("puntos" => 70, "posicion" => 3),
    "Getafe" => array("puntos" => 54, "posicion" => 8),
    "Alavés" => array("puntos" => 37, "posicion" => 16),
    "Sevilla" => array("puntos" => 70, "posicion" => 4),
    "Barcelona" => array("puntos" => 82, "posicion" => 2),
    "Real Sociedad" => array("puntos" => 56, "posicion" => 6),
    "Osasuna" => array("puntos" => 52, "posicion" => 10),
    "Granada" => array("puntos" => 56, "posicion" => 7),
    "Valencia C.F" => array("puntos" => 53, "posicion" => 9),
    "Levante" => array("puntos" => 49, "posicion" => 12),
    "Valladolid" => array("puntos" => 42, "posicion" => 13),
    "Betis" => array("puntos" => 39, "posicion" => 15),
    "RCD MAllorca" => array("puntos" => 25, "posicion" => 19),
    "Eibar" => array("puntos" => 42, "posicion" => 14)
);
//Creación de array auxiliar/temporal
$ordenada = array();

foreach ($aEquipos as $clave => $valor) {
    //Se utiliza la posición cómo el íncice         Se guardan el nombre y los puntos para no perder info
    $ordenada[$aEquipos[$clave]['posicion']] = array('nombre' => $clave, 'puntos' => $valor['puntos']);
}

print_r($ordenada);

ksort($ordenada);

for ($i = 1; $i < 4; $i++)
    print_r($ordenada[$i]);
//print_r($ordenada);
?>