<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');

use App\DB\MySQL;

$mysql = new MySQL();

$mysql->createCar($_REQUEST);

header('Location: create.php');
