<?php
include 'config.php';
include 'objects/user.php';
$user = new User();

if ($_SESSION['user']) {
    $user->username = $_SESSION['user'];
    $userData = $user->readOne();
    echo json_encode($userData, JSON_UNESCAPED_UNICODE)
}
else echo 0;