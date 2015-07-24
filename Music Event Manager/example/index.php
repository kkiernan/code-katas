<?php

use Acme\Manager;

require '../vendor/autoload.php';

$input = '{"bands":[{"id":"3","style":"Rock","date_range":"16-07/26-07"},{"id":"5","style":"Rock","date_range":"06-07/16-07"}],"shows":[{"id":"2","style":"Rock","date":"16-07"},{"id":"3","style":"Rock","date":"26-07"}]}';

$input = json_decode($input);

echo Manager::hireBands($input);
