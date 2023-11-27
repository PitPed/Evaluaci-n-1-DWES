<?php

require "./_php_exports/roomAndGameFunctions.php";

header("Content-Type: application/json");

echo json_encode(getGame(getGameFromRoom()));

?>