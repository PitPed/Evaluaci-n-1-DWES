<?php
include_once "variables.php";

function getRoom($id = null)
{
    global $playerId, $roomId;
    if ($id === null)
        $id = getUserRoomId();
    $rooms = json_decode(file_get_contents(ROOMS_FILE));
    $room = isset($rooms->$id) ? $rooms->$id : null;
    if (isset($room) && array_search($playerId, $room->playerIds) > -1) {
        return $room;
    } else
        return null;
}


function createRoom()
{
    global $playerId;
    $keysData = json_decode(file_get_contents(KEYS_FILE));
    $newRoomId = $keysData->room;

    $newRoom = array(
        'id' => $newRoomId,
        'playerIds' => array($playerId, null),
        'gameId' => null
    );
    saveRoom((object) $newRoom);
    $keysData->room++;
    file_put_contents(KEYS_FILE, json_encode($keysData));

    setUserRoom((object) $newRoom, $playerId);

    return $newRoom;
}

function deleteRoom($id)
{
    $roomsData = json_decode(file_get_contents(ROOMS_FILE));
    $room = $roomsData->$id;
    foreach ($room->playerIds as $valor) {
        if (isset($valor))
            setUserRoom(null, $valor);
    }
    unset($roomsData->$id);
    file_put_contents(ROOMS_FILE, json_encode($roomsData));
}

function saveRoom($room)
{
    $roomsData = json_decode(file_get_contents(ROOMS_FILE));
    $roomId = $room->id;
    $roomsData->$roomId = $room;
    file_put_contents(ROOMS_FILE, json_encode($roomsData));
}

function joinRoom($id)
{
    global $playerId;

    $rooms = json_decode(file_get_contents(ROOMS_FILE));
    $room = isset($rooms->$id) ? $rooms->$id : null;

    if ($room === null)
        return false;

    if ($room->playerIds[1] != null)
        return false;
    //else
    $room->playerIds[1] = $playerId;
    saveRoom($room);
    setUserRoom($room, $playerId);
    return $room->id;
}

function leaveRoom()
{

    $room = getRoom();

    if ($room === null)
        return null;
    //Si hay 2 jugadores el jugador 2 pasará a ser el 1
    if (amIAdmin())
        $room->playerIds[0] = $room->playerIds[1];
    //En ambos casos el hueco de jugador 2 queda libre
    $room->playerIds[1] = null;
    saveRoom($room);
    if (getUserIdFromRoom(true) === null && getUserIdFromRoom(false) === null)
        deleteRoom($room->id);

}



function setUserRoom($room, $userId = null)
{
    global $playerId;
    $userId === null ? $playerId : $userId;
    $usersRooms = json_decode(file_get_contents(USERS_ROOMS_FILE));
    $usersRooms->$userId = $room->id;
    file_put_contents(USERS_ROOMS_FILE, json_encode($usersRooms));
}

function setRoomGame($room, $gameId)
{
    $room->gameId = $gameId;
    saveRoom($room);
}

function amIAdmin()
{
    global $playerId;

    if (getRoom() !== null && getRoom()->playerIds[0] == $playerId)
        return true;
    else
        return false;
}

function getUserIdFromRoom($admin = true)
{
    $room = getRoom();
    //return $room->playerIds[$admin ? 0 : 1];
    return $room->playerIds[!$admin];
}

function getGameFromRoom()
{
    $room = getRoom();
    if ($room != null)
        return $room->gameId;
    else
        echo "la sala no existe o no tienes acceso";
}

function getGame()
{
    $gameID = getGameFromRoom();
    $gamesData = json_decode(file_get_contents(GAMES_DATA_FILE));
    $game = file_get_contents($gamesData->$gameID);
    return json_decode($game);
}

function writeGame($gameID, $game)
{
    $gamesData = json_decode(file_get_contents(GAMES_DATA_FILE));
    $game = file_put_contents($gamesData->$gameID, json_encode($game));
}

function createGame()
{
    global $gameType, $gameFile, $playerId;
    $keysData = json_decode(file_get_contents(KEYS_FILE));
    $newGameId = $keysData->game;

    $newGame = array(
        'gameType' => $gameType,
        'gameId' => $newGameId,
        'board' => array(array(0, 0, 0), array(0, 0, 0), array(0, 0, 0)),
        'turn' => $playerId,
        'winner' => false
    );
    $gameFile = GAMES_FILE . "/game" . $newGameId . ".json";
    file_put_contents($gameFile, json_encode($newGame));
    $gamesData = json_decode(file_get_contents(GAMES_FILE . "/games.json"));
    $gamesData->$newGameId = $gameFile;
    file_put_contents(GAMES_FILE . "/games.json", json_encode($gamesData));
    $keysData->game++;
    file_put_contents(KEYS_FILE, json_encode($keysData));

    setRoomGame(getRoom(), $newGameId);
    setUserRoom(getRoom());

    return $newGame;
}

?>