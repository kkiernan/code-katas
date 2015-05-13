<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ValidatorSpec extends ObjectBehavior {

	function it_validates_basic_email_address()
	{
		$this->validate('johndoe@example.com')->shouldReturn('Valid');
	}

	function it_validates_email_address_with_extra_chars()
	{
		$this->validate('john.doe_1970-1971@example.com')->shouldReturn('Valid');
	}

	function it_validates_email_with_subdomain()
	{
		$this->validate('johndoe@sub.example.com')->shouldReturn('Valid');
	}

	function it_invalidates_whitespace_in_hostname()
	{
		$this->validate('johndoe@example hostname.com')->shouldReturn('Invalid');
	}

	function it_invalidates_whitespace_in_local()
	{
		$this->validate('john doe@example.com')->shouldReturn('Invalid');
	}

	function it_invalidates_back_to_back_periods()
	{
		$this->validate('johndoe@example..com')->shouldReturn('Invalid');
	}

	function it_invalidates_addresses_ending_with_a_period()
	{
		$this->validate('johndoe@example.com.')->shouldReturn('Invalid');
	}

}
