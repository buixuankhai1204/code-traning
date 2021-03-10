<?php
header('Content-type: application/json');
include 'connect.php';

$input=$_POST['arraId'];
$query = "DELETE FROM user WHERE intId='$input'";
$result = mysqli_query($conn, $query);

$array_respone = [
    "success" => true,
    "status_code" => 200,
    "data" => $_SESSION['data'],
    "message" => "success",
    "error" => "lay du lieu thanh cong",
];
echo json_encode($array_respone);
?>