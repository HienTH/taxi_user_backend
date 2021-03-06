<?php
include 'config.php';
include 'objects/trip.php';

$trip = new Trip();

$trip->name = isset($_POST['name']) ? $_POST['name'] : null;
$trip->phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$trip->from = isset($_POST['from']) ? $_POST['from'] : null;
$trip->to = isset($_POST['to']) ? $_POST['to'] : null;
$trip->PNR = isset($_POST['PNR']) ? $_POST['PNR'] : null;
$trip->time = isset($_POST['time']) ? $_POST['time'] : null;
$trip->seat = isset($_POST['seat']) ? $_POST['seat'] : null;
//$trip->coin = isset($_POST['coin']) ? $_POST['coin'] : null;
$trip->price = isset($_POST['price']) ? $_POST['price'] : 0;
$trip->is_round = isset($_POST['is_round']) ? $_POST['is_round'] : 0;
$trip->details = isset($_POST['details']) ? content($_POST['details']) : 0;
$trip->num_guess = isset($_POST['guess_num']) ? $_POST['guess_num'] : 0;
//$trip->prioritize = isset($_POST['prioritize']) ? $_POST['prioritize'] : null;

$trip->userid = isset($_POST['userid']) ? $_POST['userid'] : null;

$frAr = explode(',', $trip->from);
$toAr = explode(',', $trip->to);
$frAr = $frAr[count($frAr)-2]; // from district
$frAr = $toAr[count($toAr)-2]; // to district

//echo json_encode($_POST, JSON_UNESCAPED_UNICODE);
if ($trip->name && $trip->phone && $trip->from && $trip->to && $trip->time && $trip->seat && $trip->num_guess && $trip->price) {

	if ($trip->userid){
		$add = $trip->createTripbyUser();
	} else{
		$add = $trip->create();
	}
	echo ($add ? 1 : 0);
	//echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo -1;
}
