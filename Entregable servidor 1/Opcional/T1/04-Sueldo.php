<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
        $sueldoBruto = isset($_GET["sueldo"])?$_GET["sueldo"]:2750;
        $retencion = isset($_GET["retencion"])?$_GET["retencion"]:22;
        $sueldoNeto;

        function calcularSueldo($neto,$retencion){
            global $sueldoNeto;
            $sueldoNeto =  $neto - $neto*$retencion/100;
            return $sueldoNeto;
        }
    ?>

    <style>
        #mainTable{
            border: 1px solid black;
            text-align: center;
            padding: 2px;
            border-collapse: collapse;
        }

        #mainTable th, td{
            border: 1px solid black;
            text-align: center;
            padding: 10px;
        }

    </style>
</head>
<body>
    <table id = "mainTable">
        <tr>
            <th>Sueldo Bruto</th>
            <th><?php echo "Retención (".$retencion."%)"?></th>
            <th>Sueldo Neto</th>
        </tr>
        <tr>
            <td><?php echo $sueldoBruto?></td>
            <td><?php echo $sueldoBruto*$retencion/100?></td>
            <td><?php echo calcularSueldo($sueldoBruto, $retencion)?></td>
        </tr>
    </table>
</body>
</html>