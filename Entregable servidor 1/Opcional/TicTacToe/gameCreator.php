<?php
require "./_php_exports/variables.php";

require "./_php_exports/roomAndGameFunctions.php";

$gameType = isset($_REQUEST['gameType']) ? $_REQUEST['gameType'] : 1;

createGame();






/*switch ($gameType) {
    case 1:
        createGame();
        break;
    default:
        echo "ese modo de juego no existe";
}*/



?>