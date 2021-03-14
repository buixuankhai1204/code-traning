<?php
header('Content-type: application/json');
include 'connect.php';
$redis = new Redis();
$redis->connect('redis', 6379);
$key = "keys";

if (!$redis->get($key)) {
    $query = "SELECT * FROM user";
    $result = mysqli_query($conn, $query);
    $list = array();
    if (mysqli_num_rows($result) > 0) 
    {
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
    }
    $array_respone = array(
        "success" => true,
        "status_code" => 200,
        "data" => $list,
        "message" => "success",
        "error" => "",
    );
    echo json_encode($array_respone);
    $redis->set($key, json_encode($array_respone));
} 
else 
{
    $item = ($redis->get($key));
}
echo $item;
