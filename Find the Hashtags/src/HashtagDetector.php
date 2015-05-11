<?php

class HashtagDetector {

	/**
	 * Retrieve the valid #hashtags
	 * 
	 * @param  str $string
	 * @return str
	 */
	public function detect($string)
	{
		$words = explode(' ', $string);

		$hashtags = preg_grep('/^#+[A-z0-9]+/', $words);

		$result = str_replace('#', '', implode(',', $hashtags));

		return $result;
	}

}
