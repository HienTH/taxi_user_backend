<?php
include 'config.php';
include 'objects/promotion.php';

$promotion = new Promotion();

//$infrienge->taxiid = $_SESSION['taxi'];
$promotion->userID = ($_POST['userID']) ? $_POST['userID'] : null;

$data = $promotion->readAllOneUser();

echo json_encode($data, JSON_UNESCAPED_UNICODE);
