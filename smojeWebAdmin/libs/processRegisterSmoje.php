<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$db = Database::getInstance();
	$query = 'INSERT INTO station (id, name, description, url_netmodule, url_sensor, url_tissan) '.
			 'VALUES (?, ?, ?, ?, ?, ?);';

	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['desc'];
	$urlNetmodule = $_POST['url_netmodule'];
	$urlSensors = $_POST['url_sensor'];
	$urlTissan = $_POST['url_tissan'];

	if ($stmt = $db->prepare($query)) {
		$stmt->bind_param('isssss', $id, $name, $description, $urlNetmodule, $urlSensors, $urlTissan);
	}
	$stmt->execute();
}
