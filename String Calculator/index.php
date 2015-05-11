<?php

require('StringCalculator.php');

try {
	$strCalc = new StringCalculator();
	$result = $strCalc->add("1,8,4");
	echo $result;
} catch (Exception $e) {
	print_r($e->getMessage());
}