<?php
require "./_php_exports/roomAndGameFunctions.php";
require "./_php_exports/cookiesCheck.php";

/*checkUser();*/
/*checkGame();*/

function showRoomJoiner()
{
    echo include "./_html_exports/roomJoiner.php";
}

function showRoomManager()
{
    echo "RoomManager";
}

function showCurrentRoom()
{
    echo "CurrentRoom";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    if (getUserRoomId() === null) {
        showRoomJoiner();
    } else if (amIAdmin()) {
        showRoomManager();
    } else {
        showCurrentRoom();
    }
    ?>
</body>

</html>