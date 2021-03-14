<?php
include 'connect.php';

header('Content-type: application/json');
$redis = new Redis();
$redis->connect('redis', 6379); 
$key = "keys";
$input=(int) $_POST['arraId'];
$query = "DELETE FROM user WHERE intId='$input'";
$result = mysqli_query($conn, $query);

$queryNew = "SELECT * FROM user";
$resultNew = mysqli_query($conn, $queryNew);
$listNew = array();
if (mysqli_num_rows($resultNew) > 0) 
{
    while ($row = mysqli_fetch_assoc($resultNew)) 
    {
        $listNew[] = $row;
    }
}
$array_respone = [
    "success" => true,
    "status_code" => 200,
    "data" =>$listNew,
    "message" => "success",
    "error" => "lay du lieu thanh cong",
];
if(($redis->get($key))){

    $redis->DEL($key);
}
echo json_encode($array_respone);
?>