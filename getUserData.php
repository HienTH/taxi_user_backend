<?php
include 'config.php';
//if (!$_SESSION['taxi']) {
    include 'objects/user.php';
    $user = new User();

    $user->id = isset($_POST['id']) ? $_POST['id'] : null;
    $data = array();

    if ($user->id) {
        $data = $user->readOneByID();
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    } else echo -1;
//} else echo -2;
