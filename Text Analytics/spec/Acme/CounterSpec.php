<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CounterSpec extends ObjectBehavior {

	function let()
	{
		$this->beConstructedWith('Some small sample text!');
	}

	function it_should_be_initializable()
	{
		$this->shouldHaveType('Acme\Counter');
	}

	function it_gets_the_number_of_words_in_a_string()
	{
		$this->words()->shouldReturn(4);
	}

	function it_gets_the_number_of_letters_in_a_string()
	{
		$this->letters()->shouldReturn(19);
	}

	function it_gets_the_number_of_symbols_in_a_string()
	{
		$this->symbols()->shouldReturn(1);
	}

	function it_gets_words_used_two_or_more_times()
	{
		$this->beConstructedWith('this test is a test');

		$this->repeatingWords()->shouldReturn(1);
	}

	function it_gets_letters_used_three_or_more_times()
	{
		$this->beConstructedWith('Skilleo is cool');

		$this->repeatingLetters()->shouldReturn(2);
	}

	function it_finds_words_used_only_once()
	{
		$this->lonelyWords()->shouldReturn(4);
	}

	function it_formats_response_for_skilleo()
	{
		$this->goForItBro()->shouldReturn('4, 19, 1, 0, 4, 4');
	}

}
