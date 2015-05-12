<?php namespace Acme;

class Formatter {

	/**
	 * Get anagrams array in text format.
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