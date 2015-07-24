<?php

namespace Acme;

class Bot
{
    /**
     * @var array
     */
    protected $grid;

    /**
     * Create a new bot instance.
     * 
     * @param array   $grid the grid array
     */
    public function __construct(array $grid)
    {
        $this->grid = $grid;
    }

    /**
     * Finds grid coordinates for a given character.
     * 
     * @param string $character the character
     * 
     * @return array
     */
    public function findCoords($character)
    {
        $coords = [];

        foreach ($this->grid as $m => $str) {
            $n = strpos($str, $character);

            if ($n !== false) {
                $coords[] = $m;
                $coords[] = $n;
            }
        }

        return $coords;
    }

    /**
     * Moves vertically (up or down) to the princess.
     * 
     * @param integer $princessMCoord the princess m coordinate
     * @param integer $botMCoord      the bot m coordinate
     * 
     * @return string
     */
    public function moveVertical($princessMCoord, $botMCoord)
    {
        $response = [];

        $distance = $princessMCoord - $botMCoord;

        if ($distance > 0) {
            for ($i = 0; $i < $distance; $i++) {
                $response[] = 'DOWN';
            }
        }
        else {
            for ($i = 0; $i > $distance; $i--) {
                $response[] = 'UP';
            }
        }

        return implode("\n", $response);
    }

    /**
     * Moves horizontally (left or right) to the princess.
     * 
     * @param integer $princessNCoord the princess n coordinate
     * @param integer $botNCoord      the bot n coordinate
     * 
     * @return string
     */
    public function moveHorizontal($princessNCoord, $botNCoord)
    {
        $reponse = [];

        $distance = $princessNCoord - $botNCoord;

        if ($distance > 0) {
            for ($i = 0; $i < $distance; $i++) {
                $response[] = 'RIGHT';
            }
        }
        else {
            for ($i = 0; $i > $distance; $i--) {
                $response[] = 'LEFT';
            }
        }

        return implode("\n", $response);
    }

    /**
     * Saves the princess!
     * 
     * @return string
     */
    public function savePrincess()
    {
        $response = [];

        $princessCoords = $this->findCoords('p');
        $botCoords = $this->findCoords('m');
        
        $response[] = $this->moveVertical($princessCoords[0], $botCoords[0]);
        $response[] = $this->moveHorizontal($princessCoords[1], $botCoords[1]);

        return implode("\n", $response);
    }
}
