<?php

require 'vendor/autoload.php';

use Acme\Anagram;

echo "Getting dictionary...\n";

$file = file_get_contents('http://codekata.com/data/wordlist.txt');

echo "Dictionary retrieved.\nParsing dictionary...\n";

$detector = new Anagram($file);
$anagrams = $detector->find($file);

echo "Dictionary parsed.\nFormatting text...\n";

$text = $detector->getText($anagrams);

echo "Saving file...\n";

$resultFile = fopen('results.txt', 'w');
fwrite($resultFile, $text);
fclose($resultFile);

echo "File saved to results.txt";