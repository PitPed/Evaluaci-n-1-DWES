<?php

require "./_php_exports/userFunctions.php";
require "./_php_exports/roomAndGameFunctions.php";

$fromRoom = isset($_REQUEST['FromRoom']) ? $_REQUEST['FromRoom'] : null;
$username = isset($_REQUEST['username']) ? $_REQUEST['username'] : null;


if ($fromRoom !== null) {
    $userId = getUserIdFromRoom($fromRoom);
} else {
    $userId = isset($_REQUEST['UserID']) ? $_REQUEST['UserID'] : (isset($_COOKIE['UserID']) ? $_COOKIE['UserID'] : null);
}

header("Content-Type: application/json");

if (!(isset($userId) && !isset($username))) {
    echo json_encode(array('error' => 'Solicita algún usuario'));
} else if (isset($username)) {
    echo json_encode(getUserbyName($username));
} else {
    echo json_encode(getUserbyID($userId));
}
?>