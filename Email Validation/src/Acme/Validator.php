<?php namespace Acme;

class Validator {

	/**
	 * The regex against which to compare email addresses.
	 *
	 * @var string
	 */
	protected $pattern = '/^[A-z0-9._\-]+@[A-z0-9]+\.[A-z0-9]+\.?[A-z0-9]+$/';

	/**
	 * Validate an email address.
	 *
	 * @param  string $email
	 * @return string
	 */
	public function validate($email)
	{
		if (preg_match($this->pattern, $email))
		{
			return 'Valid';
		}

		return 'Invalid';
	}

}
