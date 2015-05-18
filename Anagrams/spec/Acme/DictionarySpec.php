<?php namespace spec\Acme;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Acme\Dictionary;

class DictionarySpec extends ObjectBehavior {

	function let()
	{
		$source = "airing\nragini\nraginis\nraising\nsairing\nfoo\nbar";

		$this->beConstructedThrough('fromString', [$source]);
	}

	function it_can_be_constructed_from_a_string()
	{
		$this->getWords()->shouldBe(['airing', 'ragini', 'raginis', 'raising', 'sairing', 'foo', 'bar']);
	}

	function it_can_be_constructed_from_a_string_with_a_custom_delimiter()
	{
		$source = "airing;ragini;raginis;raising;sairing;foo;bar";

		$this->beConstructedThrough('fromString', [$source, ';']);

		$this->getWords()->shouldBe(['airing', 'ragini', 'raginis', 'raising', 'sairing', 'foo', 'bar']);
	}

	function it_gets_the_signature_for_cab()
	{
		$this->getSignature('cab')->shouldReturn('abc');
	}

	function it_gets_the_signature_for_foobar()
	{
		$this->getSignature('foobar')->shouldReturn('abfoor');
	}

	function it_gets_anagrams()
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
