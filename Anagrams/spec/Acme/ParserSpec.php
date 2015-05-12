<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior {

	function it_alpha_sorts_letters_for_cab()
	{
		$this->alphaSortLetters('cab')->shouldReturn('abc');
	}

	function it_alpha_sorts_letters_for_foobar()
	{
		$this->alphaSortLetters('foobar')->shouldReturn('abfoor');
	}

	function it_gets_words_from_content()
	{
		$this->words("hello\nworld")->shouldReturn(['hello', 'world']);
	}

	function it_gets_words_from_content_with_custom_delimiter()
	{
		$this->words("hello;world", ";")->shouldReturn(['hello', 'world']);
	}

}
