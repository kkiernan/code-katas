<?php namespace Acme;

class Parser {

	/**
	 * Returns a string of letters used in a word in alphabetical order. We will
	 * refer to this string as the words signature.
	 *
	 * @param  string $word
	 * @return string
	 */
	public function getSignature($word)
	{
		$letters = preg_split('/(.)/', $word, null, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);

		sort($letters);

		return implode('', $letters);	
	}

	/**
	 * Returns an array of words in the content as separated by the delimiter specified.
	 *
	 * @param  string $content
	 * @param  string $delimiter
	 * @return array
	 */
	public function getWords($content, $delimiter = "\n")
	{
		return explode($delimiter, $content);
	}

}
