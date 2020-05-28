<?php
require_once "../../config/connection.php";
require_once "get_first_n_posts.php";

$limit = 2;

if(isset($_GET["order"])){
    $order = $_GET["order"];

    if(isset($_GET["ctg"])){

        $fist_n_posts = get_first_n_posts($_GET["ctg"], $limit, 0, $order, $pdo);

        echo json_encode([
            "posts" => $fist_n_posts,
            "result" => "1" 
        ]); 
    }
    else{
        $fist_n_posts = get_first_n_posts(null, $limit, 0, $order, $pdo);

        echo json_encode([
            "posts" => $fist_n_posts,
            "result" => "1" 
        ]);
    }

} 
else{
    echo json_encode([
        "posts" => "Neighter set",
        "result" => "0" 
    ]); 
}
