<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class GameControllerSpec extends ObjectBehavior {

	function it_is_initializable()
	{
		$this->shouldHaveType('GameController');
	}

	function it_returns_an_array_of_players()
	{
		$this->setupPlayers('Paul-P,Dave-S')->shouldReturn(['Paul' => 'P', 'Dave' => 'S']);
	}

	function it_removes_players_with_invalid_moves()
	{
		$this->setupPlayers('Paul-P,Dave-X,John-R');
		$this->validateMoves()->shouldReturn(['Paul' => 'P', 'John' => 'R']);
	}

	function it_returns_false_if_there_are_less_than_two_players()
	{
		$this->setupPlayers('Kelly-R,John-X');
		$this->validateMoves();
		$this->validatePlayerCount()->shouldReturn(false);
	}

}
