<?php namespace Acme;

class AnagramDetector {

	public function detect($file)
	{
		$solution = '';
		$sortedWords = [];
		$words = explode("\n", $file);

		foreach ($words as $word)
		{
			$letters = preg_split('/(.)/', $word, null, PREG_SPLIT_NO_EMPTY|PREG_SPLIT_DELIM_CAPTURE);
			sort($letters);
			$letters = implode('', $letters);
			$sortedWords[$letters][] = $word;
		}

		foreach ($sortedWords as $letters => $words)
		{
			if (count($words) > 1)
			{
				$solution .= implode(' ', $words) . "\n";
			}
		}

		if ($solution != '')
		{
			$solution = substr($solution, 0, -1);
		}

		return $solution;
	}

}
