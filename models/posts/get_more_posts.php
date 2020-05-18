<?php 
require_once "../../config/connection.php";

if(isset($_GET["offset"])){
    $offset = $_GET["offset"];

    $sql = "SELECT p.id, p.title, p.createdat, c.name, u.username, u.id as 'userid', COUNT(up.postid) AS 'likes'
            FROM posts p LEFT OUTER JOIN upvotepost up ON p.id = up.postid
            INNER JOIN categories c ON p.categoryid = c.id
            INNER JOIN users u ON p.userid = u.id
            GROUP BY p.id, p.title, p.createdat, c.name, u.username, u.id
            ORDER BY p.createdat DESC
            LIMIT :l OFFSET :offset ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":offset", $offset);
    $stmt->bindParam(":l", LIMIT);
    $stmt->execute();
    $all_posts = $stmt->fetchAll();

    echo json_encode([
        "posts" => $all_posts,
        "result" => "1" 
    ]); 

}
else{
    echo json_encode([
        "msg" => "Offset parmeter does not exist.",
        "result" => "0" 
    ]);   
}
