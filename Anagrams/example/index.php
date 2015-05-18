<?php

require '../vendor/autoload.php';

use Acme\Detector;
use Acme\Parser;
use Acme\Formatter;

echo "Getting content...\n";
$content = file_get_contents('http://codekata.com/data/wordlist.txt');

echo "Content retrieved.\nCreating dictionary...\n";
$parser = new Parser;
$dictionary = $parser->getWords($content);

echo "Dictionary created.\nFinding anagrams...\n";
$detector = new Detector($dictionary);
$anagrams = $detector->getAnagrams();

echo "Anagrams found.\nFormatting as text...\n";
$formatter = new Formatter;
$text = $formatter->getText($anagrams);

echo "Saving file...\n";
$file = fopen('anagrams.txt', 'w');
fwrite($file, $text);
fclose($file);

echo "File saved to anagrams.txt";