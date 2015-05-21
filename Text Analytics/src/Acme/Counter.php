<?php namespace Acme;

class Counter {

	/**
	 * @var string
	 */
	protected $string;

	/**
	 * Create a new counter instance.
	 * 
	 * @param string $string
	 */
	public function __construct($string)
	{
		$this->string = strtolower($string);
	}

	/**
	 * Get the number of words in the string.
	 * 
	 * @return int
	 */
	public function words()
	{
		return str_word_count($this->string);
	}

	/**
	 * Get the number of letters used in the string.
	 * 
	 * @return int
	 */
	public function letters()
	{
		preg_match_all('/[A-z]/', $this->string, $matches);

		return count($matches[0]);
	}

	/**
	 *  Get the number of non-digit, non-alpha, non-whitespace symbols used in the string.
	 *  
	 * @return int
	 */
	public function symbols()
	{
		preg_match_all('/[^\d^\s^A-z]/', $this->string, $matches);

		return count($matches[0]);
	}

	/**
	 * Find the number of words that appear at least the minimum number of time specified.
	 * 
	 * @param  int $min
	 * @return int
	 */
	public function repeatingWords($min = 2)
	{
		$words = explode(' ', $this->string);

		$repeaters = array_filter(array_count_values($words), function($count) use($min)
		{
			return $count >= $min;
		});

		return count($repeaters);
	}

	/**
	 * Find the number of letters that appear at least the minimum number of times specified.
	 * 
	 * @param  integer $min
	 * @return int
	 */
	public function repeatingLetters($min = 3)
	{
		preg_match_all('/[A-z]/', $this->string, $letters);

		$repeaters = array_filter(array_count_values($letters[0]), function($count) use($min)
		{
			return $count >= $min;
		});

		return count($repeaters);
	}

	/**
	 * Find the number of words that appear only once.
	 * 
	 * @return int
	 */
	public function lonelyWords()
	{
		$words = explode(' ', $this->string);

		$repeaters = array_filter(array_count_values($words), function($count)
		{
			return $count === 1;
		});

		return count($repeaters);
	}

	/**
	 * Format the result for the Skilleo challenge.
	 *
	 * @return string
	 */
	public function goForItBro()
	{
		$result = [];
		
		$result[] = $this->words();
		$result[] = $this->letters();
		$result[] = $this->symbols();
		$result[] = $this->repeatingWords();
		$result[] = $this->repeatingLetters();
		$result[] = $this->lonelyWords();
		
		return implode(', ', $result);
	}

}
