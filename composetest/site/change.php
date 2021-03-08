<?php
header('Content-type: application/json');
$input = "tap the duc";
session_start();
foreach ($_SESSION['data'] as $key => $value) {
    if ($value['name'] == $input) {
        if ($value['status'] == "done") {
            $_SESSION['data'][$key]['status'] = "undone";
        } else {
            $_SESSION['data'][$key]['status'] = "done";

        }
    }
}
$array_respone = [
    "success" => false,
    "status_code" => 200,
    "data" => $_SESSION['data'],
    "message" => "success",
    "error" => "lay du lieu thanh cong",
];

echo json_encode($array_respone);
