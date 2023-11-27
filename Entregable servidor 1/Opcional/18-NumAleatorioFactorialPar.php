<?php
//$randomNum = rand(1, 100);

function factorialPar($i, $acumulado)
{
    if ($i <= 2) {
        return $acumulado;
    } else {
        $i -= 1;
        if ($i % 2 == 1)
            $i -= 1;
        $acumulado += $i;
        return factorialPar($i, $acumulado);
    }

}

$numeroIntroducido = $_GET['num']
    ?>
<style>
    table {
        border: 1px solid black;
        text-align: center;
        padding: 2px;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid black;
        text-align: center;
        padding: 10px;
    }
</style>

<table>
    <form>
        <input type="text" name="num" value="<?php echo $numeroIntroducido ?>">
        <input type="submit" value="Generar pares anteriores">
    </form>
    <tr>
        <th>Número introducido</th>
        <th>Suma de los pares anteriores</th>
    </tr>
    <tr>
        <td>
            <?php echo $numeroIntroducido; ?>
        </td>
        <td>
            <?php echo isset($numeroIntroducido) ? factorialPar($numeroIntroducido, 0) : 0; ?>
        </td>
    </tr>
</table>