<?php

class StringCalculator
{
	public function add($numbers)
	{
		$result = 0;
		$negativeNumbers = [];
		
		if (substr($numbers, 0, 2) == "//") {
			$tmp = preg_split("/[\n]/", substr($numbers, 2));
			$arr = explode($tmp[0], $tmp[1]);
		} else {
			$arr = preg_split("/[\n,]/", $numbers);
		}

		foreach ($arr as $number) {
			if ($number < 0) {
				$negativeNumbers[] = $number;
			}

			$result += $number;
		}

		if (count($negativeNumbers)) {
			$negativeNumbers = implode(', ', $negativeNumbers);
			throw new Exception("Negative numbers not allowed: $negativeNumbers");
		}

		return $result;
	}
}
