<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	require_once('../config.php');
	require_once('../class/Database.php');
	
	$db = Database::getInstance();
	
	updateGeneralData($db);
	updateSensorDelays($db);
}

function updateGeneralData($db) {
	$query = 'UPDATE station '.
			 'SET name=?, description=?, url_netmodule=?, url_sensor=?, url_tissan=? '.
			 'WHERE id=?;';

	$id = $_POST['id'];
	$name = $_POST['name'];
	$description = $_POST['description'];
	$urlNetmodule = $_POST['url_netmodule'];
	$urlSensors = $_POST['url_sensor'];
	$urlTissan = $_POST['url_tissan'];

	if ($stmt = $db->prepare($query)) {
		$stmt->bind_param('sssssi', $name, $description, $urlNetmodule, $urlSensors, $urlTissan, $id);
		print_r($stmt);
	}
	$stmt->execute();
}

function updateSensorDelays($db) {
	$stationId = $_POST['id'];
	$states = $_POST['state'];
	$delays = $_POST['delay'];

	print_r($states);

	foreach ($delays as $sensorId => $delay) {
		$query = 'UPDATE sensorstation SET active=?, delay=? WHERE sensor_id=? AND station_id=?;';
		if ($stmt = $db->prepare($query)) {
			$stmt->bind_param('iiii', $states[$sensorId], $delay, $sensorId, $stationId);
		}
		$stmt->execute();
	}
}