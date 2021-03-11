<?php

header('Content-type: application/json');

include 'connect.php';
$query = "SELECT * FROM user";
$result = mysqli_query($conn, $query);
$list = array();
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result)){
        $list[]=$row;
    }
}
mysqli_free_result($result);
    $array_respone = array(
        "success" => true,
        "status_code" => 200,
        "data" => $list,
        "message" => "success",
        "error" => "",
    );

echo json_encode($array_respone);
