<?php
class GameOperation {
    public static $player1_position;
    private $previousPosition;
    private $count_player1;
    private $diceNumber;

    public function __construct()
    {
        self :: $player1_position = 0;
        $this->count_player1 = 0;
    }

    /**
	 * diceRoll method is used to get random number between 1 to 6
	 */
    public function diceRoll() {
        $this->previousPosition = self :: $player1_position;
        $this->diceNumber = rand(1,6);
        $this->count_player1++;
        $this->option();
    }

    /**
     * option method is used to get random number betwwen 1 to 3.
     * call player2Move method and pass this random number.  
     */
    public function option() {
        $option = rand(1,3);
        $this->player1Move($option);
    }

    /**
     * nextMove method is used to check for option. 
     * @param option
     */
    public function player1Move($option) {
        switch ($option) {
            case 1 :
                // No play
                echo "Player1 : No Play " . $this->count_player1 . " Moves and ". self :: $player1_position . " location\n";
                break;
            case 2 :
                // Ladder
                self :: $player1_position += $this->diceNumber;

                // Player1 position go above 100 then player1 stays in the same previous position
                if (self :: $player1_position > 20) {
                    self :: $player1_position -= $this->diceNumber;
                    echo "Player1 : " . $this->count_player1 . " Mooves and " . self :: $player1_position . " position\n";
                } elseif (self :: $player1_position == 20) {
                    echo "Player1 won with " . $this->count_player1 . " moves.\n";
                    break;

                } else {
                    echo "Player1 : " . $this->count_player1 . " Mooves and " . self :: $player1_position . " position\n";
                    echo "Got ladder player1 play again \n";
                    $playAgain = readline("Enter 1 for play : ");
                    if ($playAgain == 1) {
                        $this->diceRoll();
                    }
                }
            case 3 :
                // Snake
                self :: $player1_position -= $this->diceNumber;

                // Position moves below 0 then the player1 restart from 0
                if (self :: $player1_position <= 0) {
                    self :: $player1_position = 0;
                }
                echo "Player2 : " . $this->count_player1 . " Moves and " . self :: $player1_position . " position\n";
                break;
        }
    }
}

?>