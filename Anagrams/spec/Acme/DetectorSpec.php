<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class DetectorSpec extends ObjectBehavior {

	function let()
	{
		$dictionary = ['airing', 'ragini', 'raginis', 'raising', 'sairing', 'foo', 'bar'];

		$this->beConstructedWith($dictionary);
	}

	function it_finds_anagrams()
	{
		$this->getAnagrams()->shouldReturn([
			'agiinr' => [
				'airing',
				'ragini'
			],
			'agiinrs' => [
				'raginis',
				'raising',
				'sairing'
			]
		]);
	}

}
