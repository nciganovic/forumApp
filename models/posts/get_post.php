<?php 
if(isset($_GET["id"])){
    
    $sql = "SELECT p.id, p.title, p.description, p.createdat, c.name, u.username, u.profileimg, u.id as 'userid', COUNT(up.postid) AS 'likes'
            FROM posts p LEFT OUTER JOIN upvotepost up ON p.id = up.postid
            INNER JOIN categories c ON p.categoryid = c.id
            INNER JOIN users u ON p.userid = u.id
            WHERE p.id = :id
            GROUP BY p.id, p.title, p.createdat, c.name, u.username, u.id";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $_GET["id"]);
    $stmt->execute();
    $post = $stmt->fetchAll();
}
