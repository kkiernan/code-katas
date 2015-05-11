<?php namespace Acme;

use InvalidArgumentException;

class RomanNumeralsConverter {

	/**
	 * Roman numerals and their cooresponding values.
	 * 
	 * @var arr
	 */
	private static $lookup = [
		1000 => 'M',
		900  => 'CM',
		500  => 'D',
		100  => 'C',
		90   => 'XC',
		50   => 'L',
		10   => 'X',
		9    => 'IX',
		5    => 'V',
		4    => 'IV',
		1    => 'I'
	];

	/**
	 * Convert an integer to a roman numeral.
	 * 
	 * @param  int $number
	 * @return str
	 */
	public function convert($number)
	{
		$this->guardAgainstInvalidNumber($number);

		$solution = '';

		foreach (static::$lookup as $limit => $glyph)
		{
			while ($number >= $limit)
			{
				$solution .= $glyph;
				$number -= $limit;
			}
		}

		return $solution;
	}

	/**
	 * Only accept numbers greater than zero.
	 * 
	 * @param  int $number
	 */
	public function guardAgainstInvalidNumber($number)
	{
		if ($number <= 0)
		{
			throw new InvalidArgumentException("Number must be greater than zero. Input was: $number");
		}
	}

}
