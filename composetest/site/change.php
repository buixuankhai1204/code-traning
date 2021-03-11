<?php
header('Content-type: application/json');
session_start();
include 'connect.php';

$inputStatus = $_POST['arraStatus'];
$inputId = $_POST['arraId'];
$status = $inputStatus = 0 ? '1' : '0';
$query = "UPDATE user SET flagStatus=$status WHERE intId='$inputId'";
$result = mysqli_query($conn, $query);
$array_respone = [
    "success" => false,
    "status_code" => 200,
    "data" => $_SESSION['data'],
    "message" => "success",
    "error" => "lay du lieu thanh cong",
];

echo json_encode($array_respone);
