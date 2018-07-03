<?php
require_once('vendor/autoload.php');

/**
 */
class MySQLConnection
{
	private $connection;

	public function __construct()
	{

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "auto";

		$this->connection = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		if ($this->connection->connect_error) {
		    die("Connection failed: " . $this->connection->connect_error);
		}
	}

	public function getConnection() {
		return $this->connection;
	}

	public function insert($table, $columns, $values) {
		$columnsString = join($columns, ', ');
		$valuesString = "'" . join($values, "', '") . "'";
		
		$sql = "INSERT INTO $table ($columnsString) VALUES ($valuesString)";
		$result = $this->connection->query($sql);

		return $this->connection->insert_id;
	}
}
