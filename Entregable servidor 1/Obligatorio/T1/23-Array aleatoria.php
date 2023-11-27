<?php
function createArray($size, $minRange, $maxRange)
{
    $numbers = array(rand($minRange, $maxRange));
    $repeated = array();

    while (sizeof($numbers) < $size) {
        $randomNum = rand($minRange, $maxRange);
        if (array_search($randomNum, $numbers) === false)
            $numbers[] = $randomNum;
        else
            $repeated[] = $randomNum;
    }

    rsort($numbers);
    sort($repeated);

    return array(
        "numeros" => $numbers,
        "repetidos" => $repeated
    );
}

$created = createArray(20, 1, 30);
/*echo "Array generada: " . implode(", ", $created["numeros"]) . "<br>";
echo "Números repetidos: " . implode(", ", $created["repetidos"]) . "<br>";
echo "Se han repetido " . sizeof($created["repetidos"]) . " números";*/

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>23 Array aleatoria</title>
    <style>
        table {
            border: 1px solid black;
            text-align: center;
            padding: 2px;
            border-collapse: collapse;
        }

        table th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }

        th {
            width: 100px;
            background-color: lightgray;
        }
    </style>
</head>

<body>
    <table>
        <tr>
            <th>Número</th>
            <th>Repeticiones</th>
        </tr>
        <?php
        foreach ($created['numeros'] as $num) {
            $repeticiones = array_count_values($created['repetidos']);
            echo '  <tr>
                        <td style="background-color: ' . ($num % 2 == 0 ? 'green' : 'red') . ';">' . $num . '</td>
                        <td style="background-color: lightblue;">' . (isset($repeticiones[$num]) ? $repeticiones[$num] : 0) . '</td>
                    </tr>';
        }
        ?>
    </table>
</body>

</html>