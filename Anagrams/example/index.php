<?php

require '../vendor/autoload.php';

use Acme\Dictionary;
use Acme\Format;

echo "Getting word list...\n";
$list = file_get_contents('http://codekata.com/data/wordlist.txt');

echo "Creating dictionary...\n";
$dictionary = Dictionary::fromString($list);

echo "Finding anagrams...\n";
$anagrams = $dictionary->getAnagrams();

echo "Formatting anagrams as text list...\n";
$anagrams = Format::asText($anagrams);

echo "Saving file...\n";
$file = fopen('anagrams.txt', 'w');
fwrite($file, $anagrams);
fclose($file);

echo "File saved as anagrams.txt";
