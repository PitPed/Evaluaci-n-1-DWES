<?php
require "./_php_exports/roomAndGameFunctions.php";
include "./_php_exports/redirect.php";
include_once "./_php_exports/cookiesCheck.php";
checkRoom(true);

$requestedRoom = isset($_REQUEST["room"]) ? $_REQUEST["room"] : null;

if ($requestedRoom !== null) {
    $roomId = joinRoom($requestedRoom);
}

if ($roomId !== null && $roomId) {
    echo "<script>document.cookie='RoomID=" . $roomId . "'</script>";
    redirect('room.php');
}

if (!$roomId)
    echo "No te puedes unir a esa sala";

?>
<!--DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Room</title>
</head>

<body>
    <script id="cookies">
        <!?php if ($roomId !== null && $roomId)
            echo "document.cookie='RoomID=" . $roomId . "'"; 
            redirect('room.php');?>
        </script>
        <p style="color: red;">
        <!?php if (!$roomId)
            echo "No te puedes unir a esa sala" ?>
        </p>
        <form>
            <label>Introduce el número de sala</label><br>
            <input type="text" name="room" id="roomInput"><br>
            <input type="submit" value="Unirse">
        </form>
    </body>

    </html-->