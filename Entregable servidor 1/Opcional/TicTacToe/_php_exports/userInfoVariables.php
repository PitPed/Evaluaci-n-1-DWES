<?php
function getUserRoomId()
{
    global $playerId;
    $usersRooms = json_decode(file_get_contents(USERS_ROOMS_FILE));
    return isset($usersRooms->$playerId) ? $usersRooms->$playerId : null;
}

$roomId = getUserRoomId();
?>