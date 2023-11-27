<?php
include_once "redirect.php";
include_once "variables.php";

function checkUser($currentlyInLogin = false)
{
    global $playerId;
    if ($playerId !== null) {
        redirect('./room.php');
    } else if ($playerId === null && !$currentlyInLogin) {
        redirect("./login.php");
    }
}

function checkRoom($currentlyInJoinRoom = false)
{
    global $roomId;
    $roomId = getUserRoomId();

    echo $roomId;

    if ($roomId !== null) {
        checkGame();
    } else if (!$currentlyInJoinRoom) {
        redirect('joinRoom.php');
    }

}

function checkGame()
{
    $room = getRoom();
    if ($room->gameId === null) {
        redirect('./room.php');
    } else {
        redirect('./playGame.php');
    }
}


?>