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
	 * Get the anagrams from an array of words.
	 *
	 * @return array
	 */
	public function getAnagrams()
	{
		return array_filter($this->getWordGroups(), function($words)
		{
			return count($words) > 1;
		});
	}

	/**
	 * Group the words in the dictionary together by the letters
	 * they use, in alphabetical order.
	 * 
	 * @return array
	 */
	private function getWordGroups()
	{
		$groups = [];

		foreach ($this->dictionary as $word)
		{
			$key = $this->parser->getSignature($word);

			$groups[$key][] = $word;
		}

		return $groups;
	}

}
