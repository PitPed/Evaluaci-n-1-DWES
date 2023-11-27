<?php
function actualizarSalarios(&$empleados)
{
    foreach ($empleados as &$empleado) {
        if ($empleado["salario"] >= 1000 && $empleado["salario"] <= 2000) {
            if ($empleado["edad"] > 45)
                $empleado["salario"] *= 1.04;
            else
                $empleado["salario"] *= 1.10;
        } else if ($empleado["salario"] < 1000) {
            if ($empleado["edad"] < 30)
                $empleado["salario"] = 1500;
            else if ($empleado["edad"] < 45)
                $empleado["salario"] *= 1.03;
            else
                $empleado["salario"] *= 1.15;
        }
    }
}

function printEmpleados($empleados)
{
    echo "<table>";
    echo "<tr><th>Código empleado</th><th>Nombre</th><th>Edad</th><th>Salario</th></tr>";
    foreach ($empleados as $codigo => $empleado) {
        echo "<tr><td>" . $codigo . "</td><td>" . $empleado["nombre"] . "</td><td>" . $empleado["edad"] . "</td><td>" . $empleado["salario"] . "</td></tr>";
    }
    echo "</table>";
}

$empleados = array(
    "CE0001" => array("nombre" => "Pepa", "edad" => 30, "salario" => 2200),
    "CE0002" => array("nombre" => "Reimundo", "edad" => 60, "salario" => 1750),
    "CE0003" => array("nombre" => "Ermenegilda", "edad" => 36, "salario" => 1600),
    "CE0004" => array("nombre" => "Eusebio", "edad" => 18, "salario" => 900),
    "CE0005" => array("nombre" => "Loreto", "edad" => 30, "salario" => 850),
    "CE0006" => array("nombre" => "Manuela", "edad" => 65, "salario" => 950),
);

echo "Empleados: ";
printEmpleados($empleados);

actualizarSalarios($empleados);

echo "Empleados actualizados: ";
printEmpleados($empleados);
?>