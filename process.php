<?php
	require_once('vendor/autoload.php');
	require_once('models/MySQL.php');

	$mysql = new MySQL();

	$mysql->createCar($_REQUEST);

	header('Location: auto.php');