<?php
include 'connect.php';
header('Content-type: application/json');
$redis = new Redis();
$redis->connect('redis', 6379);
$key = "keys";
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

$queryNew = "SELECT * FROM user";
$resultNew = mysqli_query($conn, $queryNew);
$listNew = array();
if (mysqli_num_rows($resultNew) > 0) {
    while ($row = mysqli_fetch_assoc($resultNew)) {
        $listNew[] = $row;
    }
}
$array_respone = [
    "success" => 200,
    "status_code" => 200,
    "status_code" => $listNew,
    "message" => "",
    "error" => "lay du lieu thanh cong",
];
if (($redis->get($key))) {
    $redis->DEL($key);
}
echo json_encode($array_respone);
