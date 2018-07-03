<?php
require_once('vendor/autoload.php');
require_once('models/MySQLConnection.php');

/**
 */
class MySQL
{
	private $mysql;

	public function __construct()
	{
		$this->mysql = new MySQLConnection();
		// $this->connection = $mysql->getConnection();
	}

	public function createCar($fields) {
		$carId = $this->mysql->insert(
			'cars',
			['name', 'overview', 'driving', 'on_the_inside', 'owning', 'servicing'],
			[$fields['name'], $fields['overview'], $fields['driving'], $fields['on_the_inside'], $fields['owning'], $fields['servicing']]
		);

		for ($i = 1; $i < 10; $i++) {
			if ($fields['image' . $i]) {
				$this->mysql->insert(
					'car_pictures', 
					['car_id', 'url'], 
					[$carId, $fields['image' . $i]]
				);
			}
		}

		return $carId;
	}
}
