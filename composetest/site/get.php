<?php

header('Content-type: application/json');
$array = [
    [
        "id" => 1,
        "name" => "an sang",
        "created_date" => time(),
        "status" => "done",
    ],
    [
        "id" => 2,
        "name" => "tap the duc",
        "created_date" => time(),
        "status" => "done",
    ],
];
session_start();
if (isset($_SESSION['data'])) {
    $array_respone = array(
        "success" => true,
        "status_code" => 200,
        "data" => $_SESSION['data'],
        "message" => "tra ve du lieu thanh cong ",
        "error" => "",
    );
} else {
    $_SESSION['data'] = $array;
    $array_respone = array(
        "success" => true,
        "status_code" => 200,
        "data" => $array,
        "message" => "tra ve du lieu thanh cong ",
        "error" => "",
    );
};

echo json_encode($array_respone);
