<?php
include 'config.php';
include 'objects/promotion.php';

$promotion = new Promotion();
$promotion->id = ($_POST['id']) ? $_POST['id'] : null;
if ($promotion->id) $data = $promotion->readOne();
else $data = array();

echo json_encode($data, JSON_UNESCAPED_UNICODE);
