<?php
class GameOperation {
    private $startPosition;
    private $previousPosition;
    private $count;
    private $diceNumber;

    public function __construct()
    {
        $this->startPosition = 0;
        $this->count = 0;
    }

    public function diceRoll() {
        $this->previousPosition = $this->startPosition;
        $this->diceNumber = rand(1,6);
        $this->count++;
        $this->option();
    }

    public function option() {
        $option = rand(1,3);
        $this->nextMove($option);
    }

    public function nextMove($option) {
        switch ($option) {
            case 1 :
                // No play
                echo "No Play " . $this->startPosition . " location\n";
                break;
            case 2 :
                // Ladder
                $this->startPosition += $this->diceNumber;
                echo "Next position " . $this->startPosition;
                break;
            case 3 :
                // Snake
                $this->startPosition -= $this->diceNumber;
                echo "Position " . $this->startPosition;
                break;
        }
    }
}

$game = new GameOperation();
$game->diceRoll();
?>