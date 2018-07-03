<?php

require_once('models/Specification.php');

/**
 * 
 */
class Category
{
	private $id;
	private $name;
	private $subCategories;
	
	public function __construct($id, $name)
	{
		$this->id = $id;
		$this->name = $name;
		
	}

	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}


	public function setSubCategories($subcategories) {
		$result = [];

		foreach ($subcategories as $subcategory) {
			$result[] = new Category($subcategory['id'], $subcategory['name']);
		}

		$this->subCategories = $result;
	}

	public function getSubCategories() {
		return $this->subCategories;
	}

	public function setSpecifications($specifications) {
		$result = [];

		foreach ($specifications as $specification) {
			$result[] = new Specification($specification['name'], $specification['value']);
		}

		$this->specifications = $result;
	}

	public function getSpecifications() {
		return $this->specifications;
	}
}
