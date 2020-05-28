<?php 
$limit = 2;

require_once "../../config/connection.php";
require_once "get_first_n_posts.php";

if(isset($_GET["offset"]) && isset($_GET["order"])){
    $offset = $_GET["offset"];

    //getting more posts related to certain category
    if(isset($_GET["ctg"])){
        $ctg = $_GET["ctg"];

        $posts = get_first_n_posts($ctg, $limit, $offset, $_GET["order"], $pdo);
    
        echo json_encode([
            "posts" => $posts,
            "result" => "1" 
        ]); 
    }
    else{

        $posts = get_first_n_posts(null, $limit, $offset, $_GET["order"], $pdo);

        echo json_encode([
            "posts" => $posts,
            "result" => "1" 
        ]); 
    }
     
}
else{
    echo json_encode([
        "msg" => "Offset or Order parmeter does not exist.",
        "result" => "0" 
    ]);   
}
