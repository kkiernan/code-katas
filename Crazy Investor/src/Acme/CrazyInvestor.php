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
	 * Get the soup letter param.
	 *
	 * @return array
	 */
	public function getSoupLetter()
	{
		return $this->soupLetter;
	}

	/**
	 * Get the code for a startup. Note the str_replace call before
	 * returning the solution. This fixes the modulus operation
	 * that returns 0 for the 6th column.
	 *
	 * @param  string $startup
	 * @return string
	 */
	public function getCode($startup)
	{
		$startup = strtoupper($startup);
		$solution = '';

		foreach (str_split($startup) as $letter)
		{
			foreach ($this->soupLetter as $key => $value)
			{
				if ($letter === $value)
				{
					$x = ceil(($key + 1) % 6);
					$y = ceil(($key + 1) / 6);
					$solution .= "$y$x";
				}
			}
		}

		return str_replace('0', '6', $solution);
	}
}
