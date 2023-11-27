<?php
require "./_php_exports/variables.php";
require "./_php_exports/roomAndGameFunctions.php";
require "./_php_exports/userFunctions.php";

$move = $_REQUEST['move'];

$room = getRoom();

$gameId = getGameFromRoom();

function moveOnBoard()
{
    global $playerId, $move, $room, $game;
    if ($game->winner != false)
        return "La partida ya ha acabado";
    else if ($game->turn != $playerId)
        return "No es tu turno";
    else {
        if ($game->board[$move / 3][$move % 3] != 0)
            return "Ese espacio está ocupado";
        else {
            $game->board[$move / 3][$move % 3] = ($playerId == $room->playerIds[0] ? "1" : "-1");
            if (checkWin()) {
                $game->winner = $playerId;
                getUserbyID($playerId)->gamesWon++;
                //Agregar el guardar usuario
            }
            //Alternar turnos
            if ($room->playerIds[0] == $playerId)
                $game->turn = $room->playerIds[1];
            else
                $game->turn = $room->playerIds[0];
            writeGame($room->gameId, $game);
        }
    }

}

function checkWin()
{
    global $playerId, $move, $room, $game;
    $board = $game->board;

    for ($i = 0; $i < 3; $i++) {
        //comprobacion horizontal
        if (array_sum($board[$i]) > 2 || array_sum($board[$i]) < -2)
            return true;
        //comprobacion vertical
        $sumaVertical = $board[0][$i] + $board[1][$i] + $board[2][$i];
        if ($sumaVertical > 2 || $sumaVertical < -2)
            return true;
    }
    //comprobacion diagonales (diagonal NorOeste-Sureste)
    //diagonal NorOeste-SurEste
    $diagonalNOSE = $board[0][0] + $board[1][1] + $board[2][2];
    //diagonal NorEste-SurOeste
    $diagonalNESO = $board[0][2] + $board[1][1] + $board[2][0];
    if (($diagonalNOSE > 2 || $diagonalNOSE < -2) || ($diagonalNESO > 2 || $diagonalNESO < -2))
        return true;
    return false;
}

if ($gameId == null)
    echo "No tienes acceso a ese";
else {
    $game = getGame();
    moveOnBoard();
}



?>