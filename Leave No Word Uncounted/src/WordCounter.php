<?php

class WordCounter {

	/**
	 * Analyze a string and return the number of words present in that string.
	 * 
	 * @param  str $phrase
	 * @return int
	 */
	public function count($phrase)
	{
		$count = count(array_filter(preg_split("/[^[:alnum:]][ ]?/", $phrase)));

		return $count;
	}

}
