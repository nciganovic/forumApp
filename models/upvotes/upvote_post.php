<?php

require_once "../../config/connection.php";

if(isset($_POST["userID"]) && isset($_POST["postID"])){

    $sql = "SELECT id FROM upvotepost WHERE userid = :userid AND postid = :postid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":userid", $_POST["userID"]);
    $stmt->bindValue(":postid", $_POST["postID"]);
    $stmt->execute();
    $result = $stmt->rowCount();


    if($result == 0){
        try{
            $sql = "INSERT INTO upvotepost (userid, postid) VALUES (:userid, :postid)";
            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(":userid", $_POST["userID"]);
            $stmt->bindValue(":postid", $_POST["postID"]);
            $stmt->execute();

            http_response_code(201);

            echo json_encode(["msg" => "upvoted"]);
        }
        catch(Exception $e){
            http_response_code(500);
     
            echo json_encode(["msg" => $e]);
        }
    }
    else{
        http_response_code(406);
     
        echo json_encode(["msg" => "Already upvoted."]);    
    }

}
else{
    http_response_code(406);

    echo json_encode(["msg" => "not all parameters are provided."]);
}



