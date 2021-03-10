<?php
header('Content-type: application/json');
session_start();
include 'connect.php';

$inputStatus = $_POST['arraStatus'];
$inputId = $_POST['arraId'];

if ($inputStatus == '0') {
    $query0 = "UPDATE user SET flagStatus=1 WHERE intId='$inputId'";
    $result = mysqli_query($conn, $query0);
} else {
    $query1 = "UPDATE user SET flagStatus=0 WHERE intId='$inputId'";
    $result = mysqli_query($conn, $query1);
}
$array_respone = [
    "success" => false,
    "status_code" => 200,
    "data" => $_SESSION['data'],
    "message" => "success",
    "error" => "lay du lieu thanh cong",
];

echo json_encode($array_respone);
