<?php namespace Acme;

class Format {

	/**
	 * Return the items in a text list format.
	 *
	 * @param  array $array
	 * @return string
	 */
	public static function asText($array)
	{
		$text = '';

		foreach ($array as $items)
		{
			$text .= implode(' ', $items) . "\n";
		}

		return trim($text);
	}

}