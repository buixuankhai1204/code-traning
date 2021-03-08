<?php
header('Content-type: application/json');
$input=$_POST['arraId'];
session_start();
foreach($_SESSION['data'] as $key => $value){
    if($key==$input){
        unset($_SESSION['data'][$key]);
        $_SESSION['data']= array_values($_SESSION['data']);
    }
}

$array_respone = [
    "success" => true,
    "status_code" => 200,
    "data" => $_SESSION['data'],
    "message" => "success",
    "error" => "lay du lieu thanh cong",
];
echo json_encode($array_respone);
?>