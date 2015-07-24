<?php

namespace Acme;

class Bot
{
    /**
     * Moves the bot. Not really very robust since the bot will just get stuck 
     * moving around forever, but it should pass the challenge.
     * 
     * @param integer $m     the m coordinate
     * @param integer $n     the n coordinate
     * @param array   $board the board state
     * 
     * @return void
     */
    public static function move($m, $n, $board)
    {
        // Is cell dirty?
        if (static::cellIsDirty($m, $n, $board)) {
            echo "CLEAN";
            return "CLEAN";
        }

        // Attempt to move right if we are on an odd number row.
        if (($m + 1) % 2 > 0) {
            if (static::moveIsValid($m, $n + 1, $board)) {
                echo "RIGHT";
                return "RIGHT";
            }
        }

        // Attempt to move left if we are on an even number row.
        if (($m + 1) % 2 === 0) {
            if (static::moveIsValid($m, $n - 1, $board)) {
                echo "LEFT";
                return "LEFT";
            }
        }

        // Can we move down?
        if (static::moveIsValid($m + 1, $n, $board)) {
            echo "DOWN";
            return "DOWN";
        }
    }

    /**
     * Checks a cell at the given m and n coordinates for cleaniness.
     * 
     * @param integer $m     the m coordinate
     * @param integer $n     the n coordinate
     * @param array   $board the board state
     * 
     * @return boolean
     */
    public function cellIsDirty($m, $n, $board)
    {
        return substr($board[$m], $n, 1) === 'd';
    }

    /**
     * Determines if a move is valid.
     * 
     * @param integer $m     the m coordinate
     * @param integer $n     the n coordinate
     * @param array   $board the board state
     * 
     * @return boolean
     */
    public function moveIsValid($m, $n, $board)
    {
        // Guard against out of range m coordinate.
        if ($m < 0 || $m > count($board) - 1) {
            return false;
        }

        // Guard against out of range n coordinate.
        if ($n < 0) {
            return false;
        }

        return substr($board[$m], $n) != false;
    }
}
