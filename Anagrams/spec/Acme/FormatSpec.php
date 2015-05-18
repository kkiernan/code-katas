<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FormatSpec extends ObjectBehavior {

	function it_formats_nested_arrays_as_text_list()
	{
		$this->asText(['foo' => ['one', 'two'], 'bar' => ['three']])->shouldReturn("one two\nthree");
	}

}
