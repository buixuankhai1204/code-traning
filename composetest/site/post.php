<?php
header('Content-type: application/json');
$nameItem = $_POST['nameItem'];
session_start();

if (isset($nameItem)) {
    $newRecord=[
        'name'=>$nameItem,
        'creatd_date'=>time(),
        'status'=>"done",
    ];
    $_SESSION['data']=array_merge($_SESSION['data'],array($newRecord));
    $array_respone = [
        "success" => true,
        "status_code" => 200,
        "data" => $_SESSION['data'],
        "message" => "success",
        "error" => "lay du lieu thanh cong",
    ];
} else {
    $array_respone = [
        "success" => false,
        "status_code" => 100,
        "data" => $_SESSION['data'],
        "message" => "error",
        "error" => "lay du lieu khong lieu thanh cong",
    ];
}
echo json_encode ($array_respone);  

?>