<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	require_once('../config.php');
	require_once('../class/Database.php');
	
	$db = Database::getInstance();
	
	updateSensorMasterData($db);
}

function updateSensorMasterData($db) {
	$titles = $_POST['title'];
	$descriptions = $_POST['description'];
	$units = $_POST['unit'];
	$displayTypes = $_POST['displayType'];
	$sortOrders = $_POST['sortOrder'];

	foreach ($titles as $sensorId => $title) {
		$query = 'UPDATE sensor SET title=?, description=?, unit=?, displaytype_id=?, sortOrder=? WHERE id=?;';
		if ($stmt = $db->prepare($query)) {
			$stmt->bind_param('sssiii', $title, $descriptions[$sensorId], $units[$sensorId], $displayTypes[$sensorId], $sortOrders[$sensorId], $sensorId);
		}
		$stmt->execute();
	}
}