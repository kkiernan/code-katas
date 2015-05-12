<?php namespace Acme;

class WordHelper {

	public function getLettersAsAlphaSortedString($word)
	{
		$letters = preg_split('/(.)/', $word, null, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);

		sort($letters);
		
		return implode('', $letters);
	}

}
