<?php

require 'vendor/autoload.php';

use Acme\AnagramDetector;

$file = file_get_contents('http://codekata.com/data/wordlist.txt');

$detector = new AnagramDetector;
$anagrams = $detector->detect($file);

$resultFile = fopen('results.txt', 'w');
fwrite($resultFile, $anagrams);
fclose($resultFile);