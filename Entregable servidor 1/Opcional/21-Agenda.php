<?php
const ARCHIVO_GUARDADO = './exports/agenda.json';
if (file_exists(ARCHIVO_GUARDADO)) {
    $archivoR = file_get_contents(ARCHIVO_GUARDADO);
    $contactos = json_decode($archivoR, true);
} else {
    echo "No hay nada en el archivo de guardado";
    $contactos = array();
    file_put_contents(ARCHIVO_GUARDADO, json_encode($contactos));
}


function nuevoContacto($nombre, $provincia, $tlf, $correo)
{
    global $contactos;
    $contactos[$tlf] = array(
        "Nombre" => $nombre,
        "Provincia" => $provincia,
        "Telefono" => $tlf,
        "Correo" => $correo
    );
}

function guardarContactos()
{
    global $contactos;
    file_put_contents(ARCHIVO_GUARDADO, json_encode($contactos));
}

if (isset($_GET["Nombre"]) && isset($_GET["Provincia"]) && isset($_GET["Telefono"]) && isset($_GET["Correo"])) {
    nuevoContacto($_GET["Nombre"], $_GET["Provincia"], $_GET["Telefono"], $_GET["Correo"]);
    guardarContactos();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
    <style>
        main {
            display: flex;
        }

        main div {
            width: 50%;
        }

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
</head>

<body>
    <main>
        <div>
            <form action="">
                <label for="Nombre">Nombre</label>
                <input type="text" name="Nombre" required />

                <label for="Provincia">Provincia</label>
                <input type="text" name="Provincia" required />

                <label for="Telefono">Telefono</label>
                <input type="text" name="Telefono" required />

                <label for="Correo">Correo</label>
                <input type="text" name="Correo" required />

                <input type="submit" value="Crear Nuevo Contacto" />
            </form>
        </div>
        <div>
            <table>
                <tr>
                    <th>Clave</th>
                    <th>Clave Interior</th>
                    <th>Contenido</th>
                </tr>
                <?php
                foreach ($contactos as $clave => $contacto) {
                    echo "<tr><td rowspan='" . sizeof($contacto) . "'>" . $clave . "</td>";
                    foreach ($contacto as $header => $data) {
                        echo ($header === array_key_first($contacto) ? "" : "<tr>") . "
                                <td>" . $header . "</td>
                                <td>" . $data . "</td>
                            </tr>";
                    }
                }
                ?>
            </table>
        </div>
    </main>
</body>

</html>