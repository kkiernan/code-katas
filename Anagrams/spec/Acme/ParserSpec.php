<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ParserSpec extends ObjectBehavior {

	function it_gets_the_signature_for_cab()
	{
		$this->getSignature('cab')->shouldReturn('abc');
	}

	function it_gets_the_signature_for_foobar()
	{
		$this->getSignature('foobar')->shouldReturn('abfoor');
	}

	function it_gets_words_from_content()
	{
		$this->getWords("hello\nworld")->shouldReturn(['hello', 'world']);
	}

	function it_gets_words_from_content_with_custom_delimiter()
	{
		$this->getWords("hello;world", ";")->shouldReturn(['hello', 'world']);
	}

}
