<?php

if(!isset($_GET['page'])) {
	require_once('adminStations.php');
} else {
	require_once($_GET['page'] .'.php');
}