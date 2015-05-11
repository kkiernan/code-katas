<?php namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class HashtagDetectorSpec extends ObjectBehavior {

	function it_is_initializable()
	{
		$this->shouldHaveType('HashtagDetector');
	}

	function it_should_return_an_empty_string_for_nothing()
	{
		$this->detect('')->shouldReturn('');
	}

	function it_should_return_hello_for_hello()
	{
		$this->detect('#hello')->shouldReturn('hello');
	}

	function it_should_return_pic_omg_for_pic_omg()
	{
		$this->detect('#pic #omg')->shouldReturn('pic,omg');
	}

	function it_should_return_pic_omg_for_pic_dude_omg()
	{
		$this->detect('#pic dude #omg')->shouldReturn('pic,omg');
	}

	function it_should_return_empty_for_hashtag()
	{
		$this->detect('#')->shouldReturn('');
	}

	function it_should_return_empty_string_for_invalid_string()
	{
		$this->detect('.?!#word')->shouldReturn('');
	}

	function it_should_return_zebra_for_hashtags_zebra()
	{
		$this->detect('####zebra')->shouldReturn('zebra');
	}

}
