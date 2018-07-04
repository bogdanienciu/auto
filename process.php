<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\Cars;

$inventory = new Cars();

$inventory->createCar($_REQUEST);

header('Location: cars.php');
