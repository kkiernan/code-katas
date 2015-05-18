<?php namespace Acme;

class CrazyInvestor {

	/**
	 * A 6x6 matrix of alphanumeric characters.
	 *
	 * @var array
	 */
	protected $soupLetter;

	/**
	 * Create a new CrazyInvestor instance.
	 *
	 * @param string $soupLetter
	 */
	public function __construct($soupLetter)
	{
		$this->soupLetter = str_split(strtoupper($soupLetter));
	}

	/**
	 * Get the soup letter.
	 *
	 * @return array
	 */
	public function getSoupLetter()
	{
		return $this->soupLetter;
	}

	/**
	 * Get the code for the specified startup.
	 *
	 * @param  string $startup
	 * @return string
	 */
	public function getCode($startup)
	{
		$solution = '';

		foreach (str_split($startup) as $letter)
		{
			$solution .= $this->getCoordinates($letter);
		}

		return $solution;
	}

	/**
	 * Get the soup letter coordinates for the specified letter. Note the
	 * str_replace call before returning the coordinates. This fixes
	 * the modulus operation that returns 0 for the 6th column.
	 *
	 * @param  string $letter
	 * @return string
	 */
	private function getCoordinates($letter)
	{
		$index = array_search(strtoupper($letter), $this->soupLetter);

		$x = ceil(($index + 1) % 6);

		$y = ceil(($index + 1) / 6);

		return $y . str_replace('0', '6', $x);
	}

}
