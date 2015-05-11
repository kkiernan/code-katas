<?php

class GameController {

	/**
	 * An array of players and their moves.
	 * 
	 * @var array
	 */
	protected $players = [];

	/**
	 * The valid moves a player can select.
	 * 
	 * @var array
	 */
	protected static $validMoves = ['R', 'P', 'S'];

	/**
	 * Analyze a string and convert it into an array of players
	 * 
	 * @param  str $playerString
	 * @return array
	 */
	public function setupPlayers($playerString)
	{
		$playerStrings = explode(',', $playerString);

		foreach ($playerStrings as $playerString) {
			list($player, $move) = explode('-', $playerString);
			$this->players[$player] = $move;
		}

		return $this->players;
	}

	/**
	 * Remove players who have invalid moves.
	 * 
	 * @return array
	 */
	public function validateMoves()
	{
		foreach ($this->players as $player => $move) {
			if (!in_array($move, self::$validMoves)) {
				unset($this->players[$player]);
			}
		}

		return $this->players;
	}

	/**
	 * Determine if there are at least two players.
	 * 
	 * @return boolean
	 */
	public function validatePlayerCount()
	{
		if (count($this->players) < 2) {
			return false;
		}

		return true;
	}

}
