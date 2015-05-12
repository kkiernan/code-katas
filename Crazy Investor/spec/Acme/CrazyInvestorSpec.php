<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CrazyInvestorSpec extends ObjectBehavior {

	function it_sets_up_the_soup_letter_matrix()
	{
		$this->beConstructedWith('ABC');
		$this->getSoupLetter()->shouldBe(['A', 'B', 'C']);
	}

	function it_gets_code_for_skilleo()
	{
		$this->beConstructedWith('NO70JE3A4Z28X1GBQKFYLPDVWCSHUTM65R9I');
		$this->getCode('Skilleo')->shouldReturn('53366643431612');
	}

	function it_gets_code_for_wazza()
	{
		$this->beConstructedWith('NO70JE3A4Z28X1GBQKFYLPDVWCSHUTM65R9I');
		$this->getCode('Wazza')->shouldReturn('5122242422');
	}

}
