<?php

header('Content-type: application/json');

$userName = 'root';
$database = "database";
$passWord = 'root';
$serverName = 'mariadb';
$conn = mysqli_connect($serverName, $userName, $passWord, $database);
// $query= "INSERT INTO Persons (PersonID, LastName,FirstName, Address, City)
// VALUES (2,'Caaaardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger');";
$query = "SELECT * FROM Persons";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
$list = array();
if(mysqli_num_rows($result)>0){
    while ($row = mysqli_fetch_assoc($result));
    $list[] = $row;
}

echo '<pre>';
print_r($list);
echo '</pre>';

foreach ($list as $item) {
    echo $item['FistName'];
}


$array = [
    [
        "id" => 1,
        "name" => "an sang",
        "created_date" => time(),
        "status" => "done",
    ],
    [
        "id" => 2,
        "name" => "tap the duc",
        "created_date" => time(),
        "status" => "done",
    ],
];
session_start();
if (isset($_SESSION['data'])) {
    $array_respone = array(
        "success" => true,
        "status_code" => 200,
        "data" => $_SESSION['data'],
        "message" => "success",
        "error" => "",
    );
} else {
    $_SESSION['data'] = $array;
    $array_respone = array(
        "success" => true,
        "status_code" => 200,
        "data" => $array,
        "message" => "success",
        "error" => "",
    );
};

echo json_encode($array_respone);
