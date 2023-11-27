<?php


function choice($input)
{
    switch ($input) {
        case 0:
            return "piedra";
        case 1:
            return "papel";
        case 2:
            return "tijera";

    }
}

function winner($player, $bot)
{
    if ($player === $bot)
        return 2;
    else
        return intval(($player + 1) % 3 == $bot);
}


$player = isset($_POST['selection']) ? intval($_POST['selection']) : null;
$reset = isset($_POST['reset']) ? intval($_POST['reset']) : null;
$wins = isset($_POST['wins']) ? json_decode($_POST['wins']) : array(0, 0, 0);

if ($player === null) {
    echo 'Debes seleccionar una de las opciones';
} else {
    $bot = rand(0, 2);
    $winner = winner($player, $bot);
    $wins[$winner]++;
}



?>
<header style="align-items: center;">
    <div style="display:flex; justify-content: space-arround;">
        <div>
            <h1>
                Jugador
                <?php echo $wins[0] ?>
            </h1>
        </div>
        <div>
            <h1> - </h1>
        </div>
        <div>
            <h1>
                <?php echo $wins[1] ?> Bot
            </h1>
        </div>
    </div>
</header>
<?php echo "Jugador: " . choice($player) . " Bot: " . choice($bot) . " Winner :" . ($winner == 2 ? "Empate" : ($winner == 1 ? "Bot" : "Player")); ?>
<form action="" method="post">
    <input type="radio" name="selection" id="piedra" value="0" required>Piedra<br>
    <input type="radio" name="selection" id="papel" value="1" required>Papel<br>
    <input type="radio" name="selection" id="tijera" value="2" required>Tijera<br>
    <input type="hidden" name="wins" id="wins" value="<?php echo json_encode($wins) ?>">
    <input type="submit" value="Jugar">
</form>