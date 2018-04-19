<?php
include 'config.php';
include 'objects/trip.php';

$trip = new Trip();

//$infrienge->taxiid = $_SESSION['taxi'];
$trip->userid = ($_POST['userid']) ? $_POST['userid'] : null;

$data = $trip->readAllOneUser();

echo json_encode($data, JSON_UNESCAPED_UNICODE);