<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnagramDetectorSpec extends ObjectBehavior {

	function it_should_return_kinship_pinkish()
	{
		$this->detect("kinship\npinkish\nenlist")->shouldReturn('kinship pinkish');
	}

	function it_should_return_enlist_inlets_listen_silent()
	{
		$this->detect("enlist\ninlets\nlisten\nsilent\nnotananagram")->shouldReturn('enlist inlets listen silent');
	}

	function it_should_return_empty_string()
	{
		$this->detect("ABC\nABC's\nABCs")->shouldReturn('');
	}

}
