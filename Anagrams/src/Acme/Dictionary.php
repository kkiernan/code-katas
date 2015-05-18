<?php namespace Acme;

class Dictionary
{
	/**
	 * An array to hold the words in this dictionary.
	 *
	 * @var array
	 */
	protected $words;

	/**
	 * Create a new dictionary instance.
	 *
	 * @param array $words
	 */
	private function __construct($words)
	{
		$this->words = $words;
	}

	/**
	 * Create a new dictionary instance using a string as the input source.
	 *
	 * @param  string $string
	 * @param  string $delimiter
	 *
	 * @return Acme\Dictionary
	 */
	public static function fromString($string, $delimiter = "\n")
	{
		$words = explode($delimiter, $string);

		return new static($words);
	}

	/**
	 * Get the words in this dictionary.
	 *
	 * @return array
	 */
	public function getWords()
	{
		return $this->words;
	}

	/**
	 * Get the anagrams in this dictionary.
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
	 * Get the 'signature' of a word. This is a string of the
	 * letters used in a word, sorted in alphabetical order.
	 *
	 * @return string
	 */
	public function getSignature($word)
	{
		$letters = preg_split('/(.)/', $word, null, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);

		sort($letters);

		return implode('', $letters);
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

		foreach ($this->words as $word)
		{
			$signature = $this->getSignature($word);

			$groups[$signature][] = $word;
		}

		return $groups;
	}

}
