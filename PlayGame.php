<?php
include 'GameOperation.php';
include 'Player2.php';
echo "Snake and Ladder Game : \n";

$player1 = new GameOperation();
$player2 = new Player2();
while (GameOperation :: $player1_position != 20 & Player2 :: $player2_position != 20) {
    $getPlayer1Input = readline("Player1 It's Your Turn. Enter 1 for Play Move : ");
    if ($getPlayer1Input == 1) {
        $player1->diceRoll();
    }

    $getPlayer2Input = readline("Player2 It's Your Turn. Enter 1 for Play Move : ");
    if ($getPlayer2Input == 1) {
        $player2->diceRoll();
    }
}
?>