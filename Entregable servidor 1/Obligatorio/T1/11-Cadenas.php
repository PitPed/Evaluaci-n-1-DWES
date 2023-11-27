<?php
/*
• La longitud de la cadena.
• La primera ocurrencia de “os”.
• La búsqueda de la palabra “nuestros”.
• La subcadena “lenguaje php”.
• La subcadena “nuestros primeros pasos”.
• El reemplazo de las palabras estamos por estoy y nuestros por mis.
• Todas las letras de la cadena en minúsculas.
• Todas las letras de la cadena en mayúsculas
• La frase con todas las letras iniciales de cada palabra en mayúscula.
*/
$main = "Estamos dando nuestros primeros pasos en programación utilizando el lenguaje php";
$longitud = strlen($main);

$os = strpos($main, "os");

$nuestros = str_contains($main, "nuestros");

$lenguaje_php = strpos($main, "lenguaje php");

$nuestros_primeros_pasos = strpos($main, "nuestros primeros pasos");

$mainReemplazada = str_replace("estamos", "estoy", strtolower($main));
$mainReemplazada = str_replace("nuestros", "mis", strtolower($mainReemplazada));

$main_en_misucula = strtolower($main);
$main_en_mayuscula = strtoupper($main);

$palabras = explode(" ", $main);
foreach ($palabras as $key => $palabra) {
    $palabras[$key] = ucfirst($palabra);
}
$primerasMayuscula = implode(" ", $palabras);

echo "La longitud de la cadena es: " . $longitud . "<br>";
echo "La primera ocurrencia de “os” está en la posición:" . $os . "<br>";
echo "La búsqueda de la palabra “nuestros” :" . $nuestros . "<br>";
echo "La subcadena “lenguaje php” está en:" . $lenguaje_php . "<br>";
echo "La subcadena “nuestros primeros pasos” está en:" . $nuestros_primeros_pasos . "<br>";
echo "El reemplazo de las palabras estamos por estamos y nuestros por mis queda: " . $mainReemplazada . "<br>";
echo "Todas las letras de la cadena en minúsculas: " . $main_en_misucula . "<br>";
echo "Todas las letras de la cadena en mayúsculas: " . $main_en_mayuscula . "<br>";
echo "La frase con todas las letras iniciales de cada palabra en mayúscula: " . $primerasMayuscula . "<br>";

?>