<?php 
require_once(__DIR__ . '/vendor/autoload.php');

use App\DB\MySQLReader;
use App\Models\Car;

// require_once('models/MySQLReader.php');
// require_once('models/Car.php');

$reader = new MySQLReader(1);

$car = new Car($reader->getOverview(), $reader->getDriving(), $reader->getOntheInside(), $reader->getOwning(), $reader->getServicing());

$pictures = $reader->getCarPictures();
$profilePicture = array_shift($pictures);

$car->setProfilePicture($profilePicture);
$car->setCarPictures($pictures);
$car->setSpecificationCategories($reader->getSpecificationCategories());

foreach ($car->getSpecificationCategories() as $category) {
	$category->setSubCategories($reader->getSubCategories($category->getId()));

	foreach ($category->getSubCategories() as $subcategory) {
		$subcategory->setSpecifications($reader->getSpecifications($subcategory->getId()));
	}
}
