<?php
class GameOperation {
    private $startPosition = 0;
    private $previousPosition;
    private $count =0;

    public function diceRoll() {
        $this->previousPosition = $this->startPosition;
        $this->startPosition = rand(1,6);
    }
}

$game = new GameOperation();
$game->diceRoll();
?>