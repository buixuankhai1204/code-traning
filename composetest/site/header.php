<?php
    $params = $_POST['API'];
    $array = [
        [
            "id" => 1,
            "name" => "an sang",
            "created_date" => time(),
            "status" => 1,
        ],
        [
            "id" => 2,
            "name" => "tap the duc",
            "created_date" => time(),
            "status" => 1,
        ],
    ];
    $input = json_encode($array);
    $title = "todolist";
    setcookie($title, $input, time() + (86400 * 30));
    var_dump($_COOKIE);
    $array_respone = array(
        "success" => true,
        "status_code" => 200,
        "data" => $array,
        "message" => "tra ve du lieu thanh cong ",
        "error" => "",
    );

    if (isset($_POST['API']) && empty($params)) {
        $array_respone = [
            "success" => false,
            "status_code" => 100,
            "data" => null,
            "message" => "du lieu bi loi",
            "error" => "khong tim thay params",
        ];
    } else {

        $newRecord = array(
            "id" => 3,
            "name" => $params,
            "created_date" => time(),
            "status" => 1,
        );
        echo '<pre>';
        print_r(json_decode($_COOKIE[$title]));
        echo '</pre>';
        $array = array_merge(json_decode($_COOKIE[$title]), array($newRecord));
        $array_respone = array(
            "success" => "",
            "status_code" => 200,
            "data" => $array,
            "message" => "them du lieu thanh cong",
            "error" => null,
        );
    };



    // header('Content-Type: application/json');
    echo '<pre>';
    print_r($array);
    echo '</pre>';
    echo json_encode($array_respone);
    // exit;
    // $array= array_merge($array,array($newRecord));
    ?>