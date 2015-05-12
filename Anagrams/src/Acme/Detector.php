<?php namespace Acme;

class Detector {

	/**
	 * An array of words through which to search for anagrams.
	 *
	 * @var array
	 */
	protected $dictionary = [];

	/**
	 * A Parser helper.
	 *
	 * @var \Acme\Parser
	 */
	protected $parser;

	/**
	 * Create a new Detector instance.
	 *
	 * @param  array $dictionary
	 */
	public function __construct($dictionary)
	{
		$this->dictionary = $dictionary;
		$this->parser = new Parser;
	}

	/**
	 * Find the anagrams in an array of words.
	 *
	 * @return array
	 */
	public function anagrams()
	{
		$anagrams = [];

		foreach ($this->dictionary as $word)
		{
			$key = $this->parser->alphaSortLetters($word);

			$anagrams[$key][] = $word;
		}

		foreach ($anagrams as $key => $words)
		{
			if (count($words) <= 1)
			{
				unset($anagrams[$key]);
			}
		}

		return $anagrams ?: '';
	}

}
