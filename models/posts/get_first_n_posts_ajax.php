<?php
require_once "../../config/connection.php";
require_once "get_first_n_posts.php";

$limit = 10;

if(isset($_GET["order"])){
    $order = $_GET["order"];

    if(isset($_GET["ctg"])){

        $fist_n_posts = get_first_n_posts($_GET["ctg"], $limit, 0, $order, $pdo);

        http_response_code(202);

        echo json_encode([
            "posts" => $fist_n_posts
        ]); 
    }
    else{
        $fist_n_posts = get_first_n_posts(null, $limit, 0, $order, $pdo);

        http_response_code(202);

        echo json_encode([
            "posts" => $fist_n_posts
        ]);
    }

} 
else{
    http_response_code(406);

    echo json_encode([
        "posts" => "Parameters are not set."
    ]); 
}
