<?php

require_once('models/CarPicture.php');
require_once('models/Category.php');

class Car {
	private $profilePicture;
	private $carpicture;
	private $overview;
	private $driving;
	private $ontheinside;
	private $owning;
	private $servicing;
	private $specificationCategories;

	public function __construct ($overview ='', $driving = '', $ontheinside = '', $owning = '', $servicing = '') {
		$this->overview = $overview;
		$this->driving = $driving;
		$this->ontheinside = $ontheinside;
		$this->owning = $owning;
		$this->servicing = $servicing;
	}

	public function setProfilePicture($picture) {
		$this->profilePicture = new CarPicture($picture['url']);
	}

	public function getProfilePicture() {
		return $this->profilePicture;
	}

	public function setCarPictures($pictures) {
			$result = [];

		foreach ($pictures as $picture) {
			$result[] = new CarPicture($picture['url']);
		}

		$this->carpictures = $result;
	}

	public function getCarPictures() {
		return $this->carpictures;
	}

	public function getOverview() {
			return $this->overview;
	}

	public function getDriving() {
				return $this->driving;
	}

	public function getOntheInside() {
				return $this->ontheinside;
	}

	public function getOwning() {
				return $this->owning;
	}

	public function setSpecificationCategories($categories) {
		$result = [];

		foreach ($categories as $category) {
			$result[] = new Category($category['id'], $category['name']);
		}

		$this->specificationCategories = $result;
	}

	public function getSpecificationCategories() {
		return $this->specificationCategories;
	}


	public function getServicing() {
				return $this->servicing;
	}
}