<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AnagramSpec extends ObjectBehavior {

	function it_should_return_kinship_pinkish_as_array()
	{
		$this->beConstructedWith("kinship\npinkish\nenlist");
		$this->find()->shouldReturn(['hiiknps' => ['kinship', 'pinkish']]);
	}

	function it_should_return_kinship_pinkish_as_text()
	{
		$this->beConstructedWith("kinship\npinkish\nenlist");
		$anagrams = $this->find();
		$this->getText($anagrams)->shouldReturn('kinship pinkish');
	}

	function it_should_return_enlist_inlets_listen_silent_as_array()
	{
		$this->beConstructedWith("enlist\ninlets\nlisten\nsilent\nnotananagram");
		$this->find()->shouldReturn(['eilnst' => ['enlist', 'inlets', 'listen', 'silent']]);
	}

	function it_should_return_enlist_inlets_listen_silent_as_text()
	{
		$this->beConstructedWith("enlist\ninlets\nlisten\nsilent\nnotananagram");
		$anagrams = $this->find();
		$this->getText($anagrams)->shouldReturn('enlist inlets listen silent');
	}

	function it_should_return_empty_string()
	{
		$this->beConstructedWith("ABC\nABC's\nABCs");
		$this->find()->shouldReturn('');
	}

}
