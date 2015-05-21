<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidateSpec extends ObjectBehavior {

	function it_is_initializable()
	{
		$this->shouldHaveType('Acme\Validate');
	}

	function it_requires_at_least_six_characters()
	{
		$this->hasMinLength('$A11CAPS$')->shouldReturn(true);
	}

	function it_detects_whitespace_characters()
	{
		$this->hasWhitespace('has whitespace')->shouldReturn(true);
	}

	function it_requires_one_capital_letter()
	{
		$this->hasCapitalLetter('$A11CAPS$')->shouldReturn(true);
	}

	function it_requires_one_number()
	{
		$this->hasNumber('$A11CAPS$')->shouldReturn(true);
	}

	function it_requires_one_symbol()
	{
		$this->hasSymbol('$A11CAPS$')->shouldReturn(true);
	}

	function it_fails_mypassword123()
	{
		$this->password('mypassword123')->shouldReturn('Invalid');
	}

	function it_passed_Some_Pass()
	{
		$this->password('#Some_Pass1#')->shouldReturn('Valid');
	}

	function it_passes_all_caps()
	{
		$this->password('$A11CAPS$')->shouldReturn('Valid');
	}

}
