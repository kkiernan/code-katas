<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class WordCounterSpec extends ObjectBehavior {

	function it_is_initializable()
	{
		$this->shouldHaveType('WordCounter');
	}

	function it_should_return_1_for_hello()
	{
		$this->count('hello')->shouldReturn(1);
	}

	function it_should_return_2_for_hello_world()
	{
		$this->count('hello world')->shouldReturn(2);
	}

	function it_should_return_4_for_hello_world_whats_up()
	{
		$this->count('hello world whats up')->shouldReturn(4);
	}

	function it_should_return_2_for_period_test()
	{
		$this->count('period.test')->shouldReturn(2);
	}

	function it_should_return_10_for_skilleo_example()
	{
		$this->count('Praesent sapien.massa, convallis a pellentesque-nec, egestas non nisi.')->shouldReturn(10);
	}

	function it_should_return_8_for_my_example()
	{
		$this->count('This is&another test.of, my own-man.')->shouldReturn(8);
	}

}
