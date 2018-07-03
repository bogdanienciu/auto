<?php
require_once('vendor/autoload.php');
require_once('models/MySQLConnection.php');

/**
 */
class MySQLReader
{
	private $id;
	private $connection;
	private $car;

	public function __construct($id)
	{
		 $this->id = $id;

		$mysql = new MySQLConnection();
		$this->connection = $mysql->getConnection();

		$sql = "SELECT * FROM cars where id = '" . $this->id . "'";
		$result = $this->connection->query($sql);

		$this->carRow = $result->fetch_assoc();
	}

	public function getCarPictures() {
		$sql = "SELECT * FROM car_pictures where car_id = '" . $this->id . "'";
		$result = $this->connection->query($sql);
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}

	public function getOverview() {
		
		return $this->carRow['overview'];
	}

	public function getDriving() {
		
		return $this->carRow['driving'];
	}

	public function getOntheInside() {
		
		return $this->carRow['on_the_inside'];
	}
	
	public function getOwning() {
		
		return $this->carRow['owning'];
	}

	public function getSpecificationCategories() {
		$sql = "SELECT specification_categories.id, specification_categories.name
			FROM `specifications`
			INNER JOIN specification_categories ON specification_categories.id = specifications.category_id
			where car_id = '" . $this->id . "' 
			GROUP BY specification_categories.id"; 
		$result = $this->connection->query($sql);
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}
 	
 	public function getSubCategories($category_id) {
		$sql = "SELECT specification_subcategories.id, specification_subcategories.name
			FROM `specifications`
			INNER JOIN specification_subcategories ON specification_subcategories.id = specifications.subcategory_id
			where
				car_id = '" . $this->id . "' 
				and category_id = '" . $category_id . "' 
			GROUP BY specification_subcategories.id"; 
		$result = $this->connection->query($sql);
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}

 	public function getSpecifications($category_id, $subcategory_id) {
		$sql = "SELECT specifications.name, specifications.value
			FROM `specifications`
			where
				car_id = '" . $this->id . "' 
				and category_id = '" . $category_id . "'
				and subcategory_id = '" . $subcategory_id . "'"; 
		$result = $this->connection->query($sql);
	
		return $result->fetch_all(MYSQLI_ASSOC);
	}
 	
 	public function getServicing() {
		
		return $this->carRow['servicing'];
	}
}