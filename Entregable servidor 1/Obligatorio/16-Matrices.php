<?php
function crearMatriz($x, $y)
{
    $matriz = array();
    for ($i = 0; $i < $x; $i++) {
        for ($j = 0; $j < $y; $j++) {
            $matriz[$i][$j] = mt_rand(0, 9);
        }
    }
    return $matriz;
}

function mostrarMatriz($matriz)
{
    echo "Matriz:<br>";
    foreach ($matriz as $key => $fila) {
        echo implode(" ", $fila);
        echo "<br>";
    }
}

function mostrarDiagonal($matriz)
{
    echo "Diagonal:<br>";
    for ($i = 0; $i < count($matriz) && $i < count($matriz[$i]); $i++) {
        echo $matriz[$i][$i] . " ";
    }
}

function mostrarColumna($matriz, $indice)
{
    echo "Columna " . $indice . ":<br>";
    for ($i = 0; $i < count($matriz); $i++) {
        echo $matriz[$i][$indice] . " ";
    }
}

function calcularMediaImpares($matriz)
{
    $acumulador = 0;
    $i = 0;
    foreach ($matriz as $fila) {
        for ($j = 0; $j < count($fila); $j++) {
            if ($fila[$j] % 2 == 1) {
                $acumulador += $fila[$j];
                $i++;
            }
        }
    }

    return $acumulador / $i;
}

$matriz = crearMatriz(3, 4);
mostrarMatriz($matriz);
echo "La media de los números impares es: " . calcularMediaImpares($matriz);
echo "<br>";
mostrarDiagonal($matriz);
echo "<br>";
mostrarColumna($matriz, 0);

?>