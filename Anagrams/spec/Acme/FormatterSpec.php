<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormatterSpec extends ObjectBehavior {

	function it_formats_array_as_text()
	{
		$this->getText(['abc' => ['cab', 'bac'], 'abcd' => ['acdb', 'abdc']])->shouldReturn("cab bac\nacdb abdc");
	}

}
