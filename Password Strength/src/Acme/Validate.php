<?php namespace Acme;

class Validate {

	/**
	 * Check that a password has at least six characters, at least one capital letter,
	 * at least one number, at least one accepted symbol and no whitespace.
	 * 
	 * @param  string $string
	 * @return string
	 */
	public function password($password)
	{
		if (
			! $this->hasMinLength($password) ||
			! $this->hasCapitalLetter($password) ||
			! $this->hasNumber($password) ||
			! $this->hasSymbol($password) ||
			  $this->hasWhitespace($password)
		)
		{
			return 'Invalid';
		}

		return 'Valid';
	}

	/**
	 * Check if the string is at least 6 characters long.
	 * 
	 * @param  string $string
	 * @return boolean
	 */
	public function hasMinLength($string)
	{
		return strlen($string) >= 6;
	}

	/**
	 * Check if the string has any whitespace characters.
	 * 
	 * @param  string  $string
	 * @return boolean
	 */
	public function hasWhitespace($string)
	{
		return preg_match('/\s/', $string) ? true : false;
	}

	/**
	 * Check if the string has at least one capital letter.
	 * 
	 * @param  string  $string
	 * @return boolean
	 */
	public function hasCapitalLetter($string)
	{
		return preg_match('/[A-Z]/', $string) ? true : false;
	}

	/**
	 * Check if the string has at least one number.
	 * 
	 * @param  string  $string
	 * @return boolean
	 */
	public function hasNumber($string)
	{
		return preg_match('/[0-9]/', $string) ? true : false;
	}

	/**
	 * Check if the string has at least one of the accepted symbols.
	 * 
	 * @param  string  $string
	 * @return boolean
	 */
	public function hasSymbol($string)
	{
		return preg_match('/[#_$&-]/', $string) ? true : false;
	}

}
