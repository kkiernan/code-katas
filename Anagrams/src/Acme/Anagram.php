<?php namespace Acme;

class Anagram {

	/**
	 * The file in which to search for anagrams.
	 * 
	 * @var string
	 */
	protected $file;

	/**
	 * An array of words created from the file.
	 * 
	 * @var array
	 */
	protected $dictionary = [];

	/**
	 * WordHelper object to help with parsing words.
	 * 
	 * @var WordHelper
	 */
	protected $wordHelper;

	/**
	 * Anagram constructor.
	 * 
	 * @param string $file
	 * @param string $delimiter
	 */
	public function __construct($file, $delimiter = "\n")
	{
		$this->file = $file;

		$this->dictionary = explode($delimiter, $file);

		$this->wordHelper = new WordHelper();
	}

	/**
	 * Return an array of anagrams grouped by a key made of the letters
	 * (sorted in alphabetical order) that are used to spell the word.
	 * 
	 * @return array
	 */
	public function find()
	{
		$anagrams = [];

		foreach ($this->dictionary as $word)
		{
			$key = $this->wordHelper->getLettersAsAlphaSortedString($word);

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

	/**
	 * Get a text format of anagrams where the anagram sets
	 * are each listed on a single line.
	 * 
	 * @param  array $anagrams
	 * @return string
	 */
	public function getText($anagrams)
	{
		$text = '';

		foreach ($anagrams as $key => $words)
		{
			$text .= implode(' ', $words) . "\n";
		}

		if ($text != '')
		{
			$text = substr($text, 0, -1);
		}

		return $text;
	}

}
