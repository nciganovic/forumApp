<?php 
$limit = 10;

require_once "../../config/connection.php";
require_once "get_first_n_posts.php";

if(isset($_GET["offset"]) && isset($_GET["order"])){
    $offset = $_GET["offset"];

    //getting more posts related to certain category
    if(isset($_GET["ctg"])){
        $ctg = $_GET["ctg"];

        $posts = get_first_n_posts($ctg, $limit, $offset, $_GET["order"], $pdo);
    
        http_response_code(202);

        echo json_encode([
            "posts" => $posts
        ]); 
    }
    else{

        $posts = get_first_n_posts(null, $limit, $offset, $_GET["order"], $pdo);

        http_response_code(202);

        echo json_encode([
            "posts" => $posts
        ]); 
    }
     
}
else{
    http_response_code(406);

    echo json_encode([
        "msg" => "Offset or Order parmeter does not exist."
    ]);   
}
