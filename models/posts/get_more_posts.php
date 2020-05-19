<?php 
$limit = 2;

require_once "../../config/connection.php";

if(isset($_GET["offset"])){
    $offset = $_GET["offset"];

    //getting more posts related to certain category
    if(isset($_GET["ctg"])){
        $ctg = $_GET["ctg"];

        $sql = "SELECT p.id, p.title, p.createdat, c.name, u.username, u.id as 'userid', COUNT(up.postid) AS 'likes'
                FROM posts p LEFT OUTER JOIN upvotepost up ON p.id = up.postid
                INNER JOIN categories c ON p.categoryid = c.id
                INNER JOIN users u ON p.userid = u.id
                WHERE c.name = :ctg
                GROUP BY p.id, p.title, p.createdat, c.name, u.username, u.id
                ORDER BY p.createdat DESC
                LIMIT :limit OFFSET :offset ";
        
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->bindValue(':ctg', $ctg);
        $stmt->execute();
        $all_posts = $stmt->fetchAll();
    
        echo json_encode([
            "posts" => $all_posts,
            "result" => "1" 
        ]); 
    }
    else{
        $sql = "SELECT p.id, p.title, p.createdat, c.name, u.username, u.id as 'userid', COUNT(up.postid) AS 'likes'
                FROM posts p LEFT OUTER JOIN upvotepost up ON p.id = up.postid
                INNER JOIN categories c ON p.categoryid = c.id
                INNER JOIN users u ON p.userid = u.id
                GROUP BY p.id, p.title, p.createdat, c.name, u.username, u.id
                ORDER BY p.createdat DESC
                LIMIT :limit OFFSET :offset ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
        $stmt->execute();
        $all_posts = $stmt->fetchAll();

        echo json_encode([
            "posts" => $all_posts,
            "result" => "1" 
        ]); 
    }
     
    

}
else{
    echo json_encode([
        "msg" => "Offset parmeter does not exist.",
        "result" => "0" 
    ]);   
}
