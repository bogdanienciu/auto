<?php
require_once(__DIR__ . '/vendor/autoload.php');
require_once(__DIR__ . '/secure.php');


use App\DB\Inventories\Cars;
use Valitron\Validator;

$validator = new Validator($_REQUEST);
$validator->rule('required', ['name', 'overview', 'driving', 'on_the_inside', 'owning', 'servicing']);

if($validator->validate()) {
    $inventory = new Cars();

	$inventory->createCar($_REQUEST);

	header('Location: cars.php');
} else {
    // Errors
    // dd($validator->errors());
    header('Location: create.php');
}