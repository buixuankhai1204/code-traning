<?php
header('Content-type: application/json');
include 'connect.php';
$input = $_POST['nameItem'];
if ($input == "") {
    $array_respone = [
        "success" => false,
        "status_code" => 100,
        "message" => "error",
        "error" => "lay du lieu khong lieu thanh cong",
    ];
echo json_encode($array_respone);
}
$query = "INSERT INTO user (strTitle, flagStatus) VALUES ('$input', 1 )";
$result = mysqli_query($conn, $query);
$array_respone = [
    "success" => 200,
    "status_code" => 200,
    "message" => "",
    "error" => "lay du lieu thanh cong",
];
echo json_encode($array_respone);
