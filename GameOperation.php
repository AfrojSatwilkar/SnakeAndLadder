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

    /**
	 * diceRoll method is used to get random number between 1 to 6
	 */
    public function diceRoll() {
        $this->previousPosition = $this->startPosition;
        $this->diceNumber = rand(1,6);
        $this->count++;
        $this->option();
    }

    /**
     * option method is used to get random number betwwen 1 to 3.
     * call nextMove method and pass this random number.  
     */
    public function option() {
        $option = rand(1,3);
        $this->nextMove($option);
    }

    /**
     * nextMove method is used to check for option. 
     * @param option
     */
    public function nextMove($option) {
        switch ($option) {
            case 1 :
                // No play
                echo "No Play " . $this->count . " Moves and ". $this->startPosition . " location\n";
                break;
            case 2 :
                // Ladder
                $this->startPosition += $this->diceNumber;

                // Player position go above 100 then player stays in the same previous position
                if ($this->startPosition > 100) {
                    $this->startPosition -= $this->diceNumber;
                }
                echo $this->count . " Mooves and " . $this->startPosition . " position\n";
                break;
            case 3 :
                // Snake
                $this->startPosition -= $this->diceNumber;

                // Position moves below 0 then the player restart from 0
                if ($this->startPosition <= 0) {
                    $this->startPosition = 0;
                }
                echo $this->count . " Moves and " . $this->startPosition . " position\n";
                break;
        }

        // Player position is not equal to 100 then repeat move
        if ($this->startPosition != 100) {
            $this->diceRoll();
        } else {
            echo "Player won with " . $this->count . " moves.\n";
        }
    }
}

$game = new GameOperation();
$game->diceRoll();
?>