<?php
header('Content-type: application/json');
$input="an sang";
session_start();
foreach($_SESSION['data'] as $key => $value){
    if($value['name']==$input){
        unset($_SESSION['data'][$key]);
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
?>