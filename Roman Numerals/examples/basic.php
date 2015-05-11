<?php

require 'vendor/autoload.php';

use Acme\RomanNumeralsConverter;

$converter = new RomanNumeralsConverter;

try {
	echo $converter->convert(-10);
} catch (Exception $e) {
	echo $e->getMessage();
}
