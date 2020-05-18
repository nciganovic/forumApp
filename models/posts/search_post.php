<?php
require_once "../../config/connection.php";

if(isset($_GET["search"])){
    $search = trim($_GET["search"]);
    $any = '%'.$search.'%';

    $sql = "SELECT p.id, p.title, p.createdat, c.name, u.username, u.id as 'userid', COUNT(up.postid) AS 'likes'
            FROM posts p LEFT OUTER JOIN upvotepost up ON p.id = up.postid
            INNER JOIN categories c ON p.categoryid = c.id
            INNER JOIN users u ON p.userid = u.id
            WHERE p.title LIKE :search OR p.description LIKE :search 
            GROUP BY p.id, p.title, p.createdat, c.name, u.username, u.id
            ORDER BY p.createdat DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":search", $any);
    $stmt->execute();
    $all_posts = $stmt->fetchAll();

    echo json_encode([
        "posts" => $all_posts,
        "result" => "1" 
    ]);
}
else{
    echo json_encode([
        "msg" => "Search parmeter does not exist.",
        "result" => "0" 
    ]);   
}