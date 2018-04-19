<?php
include 'config.php';
include 'objects/user.php';

$user = new User();

$user->username = isset($_POST['username']) ? $_POST['username'] : null;
$user->password = isset($_POST['password']) ? $_POST['password'] : null;
$user->name = isset($_POST['name']) ? $_POST['name'] : null;
$user->phone = isset($_POST['phone']) ? $_POST['phone'] : null;
$user->address = isset($_POST['address']) ? $_POST['address'] : null;

if ($user->username && $user->password && $user->phone) {
	$add = $user->create();
	echo ($add ? 1 : 0);
	//echo json_encode($data, JSON_UNESCAPED_UNICODE);
} else {
    echo -1;
}