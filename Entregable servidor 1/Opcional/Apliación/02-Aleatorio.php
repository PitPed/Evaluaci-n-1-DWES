<?php


if (isset($_REQUEST["probar"]) || isset($_REQUEST["reiniciar"])) {
    $rango = array($_REQUEST["min"], $_REQUEST["max"]);
    $numero_secreto = isset($_REQUEST["reiniciar"]) || !isset($_REQUEST["numero-secreto"]) ? mt_rand($rango[0], $rango[1]) : $_REQUEST["numero-secreto"];
    $respuesta = $_REQUEST["respuesta"];
    $intentados = isset($_REQUEST["reiniciar"]) ? array() : explode(",", $_REQUEST["intentados"]);
    $intentados[] = $respuesta;
} else {
    $rango = null;
    $numero_secreto = null;
    $respuesta = null;
    $intentados = null;
    $intentados = array();
}

if ($respuesta == $numero_secreto) {
    echo '<script>alert("Has ganado en ' . count($intentados) . ' intentos: ' . implode(",", $intentados) . '")</script>';
}
?>
<form action="" method="POST">
    <input type="hidden" name="numero-secreto" value="<?php echo isset($numero_secreto) ? $numero_secreto : "" ?>" />
    <input type="hidden" name="intentados" value="<?php echo isset($intentados) ? implode(",", $intentados) : "" ?>" />
    <label for="min">Número mínimo</label>
    <input type="number" name="min" id="" value="<?php echo $rango[0] ?>" <?php echo isset($rango) ? "readonly " : "" ?>
        required><br>
    <label for="max">Número máximo</label>
    <input type="number" name="max" id="" value="<?php echo $rango[1] ?>" <?php echo isset($rango) ? "readonly " : "" ?>
        required><br>
    <label for="respuesta">Probar</label>
    <input type="number" name="respuesta" id="" value="<?php echo $respuesta ?>" required><br>
    <input type="submit" value="Probar" name="probar">
    <input type="submit" value="Reiniciar" name="reiniciar">

</form>