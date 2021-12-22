<?php
class Player2 {
    public static $player2_position;
    private $previousPosition;
    private $count_player2;
    private $diceNumber;

    public function __construct()
    {
        self :: $player2_position = 0;
        $this->count_player2 = 0;
    }

    /**
	 * diceRoll method is used to get random number between 1 to 6
	 */
    public function diceRoll() {
        $this->previousPosition = self :: $player2_position;
        $this->diceNumber = rand(1,6);
        $this->count_player2++;
        $this->option();
    }

    /**
     * option method is used to get random number betwwen 1 to 3.
     * call player2Move method and pass this random number.  
     */
    public function option() {
        $option = rand(1,3);
        $this->player2Move($option);
    }

    /**
     * nextMove method is used to check for option. 
     * @param option
     */
    public function player2Move($option) {
        switch ($option) {
            case 1 :
                // No play
                echo "Player2 : No Play " . $this->count_player2 . " Moves and ". self :: $player2_position . " location\n";
                break;
            case 2 :
                // Ladder
                self :: $player2_position += $this->diceNumber;

                // Player2 position go above 100 then player2 stays in the same previous position
                if (self :: $player2_position > 20) {
                    self :: $player2_position -= $this->diceNumber;
                    echo "Player2 : " . $this->count_player2 . " Mooves and " . self :: $player2_position . " position\n";
                } elseif (self :: $player2_position == 20) {
                    echo "Player2 won with " . $this->count_player2 . " moves.\n";
                    break;

                } else {
                    echo "Player2 : " . $this->count_player2 . " Mooves and " . self :: $player2_position . " position\n";
                    echo "Got ladder player2 play again \n";
                    $playAgain = readline("Enter 1 for play : ");
                    if ($playAgain == 1) {
                        $this->diceRoll();
                    }
                }
            case 3 :
                // Snake
                self :: $player2_position -= $this->diceNumber;

                // Position moves below 0 then the player2 restart from 0
                if (self :: $player2_position <= 0) {
                    self :: $player2_position = 0;
                }
                echo "Player2 : " . $this->count_player2 . " Moves and " . self :: $player2_position . " position\n";
                break;
        }
    }
}

?>