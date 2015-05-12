<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WordHelperSpec extends ObjectBehavior {

	function it_returns_abc_for_cab()
	{
		$this->getLettersAsAlphaSortedString('cab')->shouldReturn('abc');
	}

}
