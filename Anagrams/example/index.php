<?php

require 'vendor/autoload.php';

use Acme\Detector;
use Acme\Parser;
use Acme\Formatter;

echo "Getting content...\n";
$content = file_get_contents('http://codekata.com/data/wordlist.txt');

echo "Content retrieved.\nCreating dictionary...\n";
$parser = new Parser;
$dictionary = $parser->words($content);

echo "Dictionary created.\nFinding anagrams...\n";
$detector = new Detector($dictionary);
$anagrams = $detector->anagrams();

echo "Anagrams found.\nFormatting as text...\n";
$formatter = new Formatter;
$text = $formatter->getText($anagrams);

echo "Saving file...\n";
$file = fopen('results.txt', 'w');
fwrite($file, $text);
fclose($file);

echo "File saved to results.txt";