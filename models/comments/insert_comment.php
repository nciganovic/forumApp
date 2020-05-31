<?php
session_start();
require_once "../../config/connection.php";

if(isset($_SESSION["userid"])){
    if(isset($_POST["commentID"]) && isset($_POST["text"]) && isset($_POST["postID"])){
        
        $comment_id = $_POST["commentID"];
        $text = $_POST["text"];
        $post_id = $_POST["postID"];

        $sql = "";

        /* If comment has no parent, main comment */
        if($comment_id == "0"){
            $sql = "INSERT INTO comments (userid, postid, text)
                    VALUES(:uid, :postid, :txt)";
        }
        else{
            $sql = "INSERT INTO comments (userid, postid, parentid, text)
                    VALUES(:uid, :postid, :parid, :txt)";
        }

        try{
            $stmt = $pdo->prepare($sql);
            
            $stmt->bindParam(":uid", $_SESSION["userid"]);
            $stmt->bindParam(":postid", $post_id);
            $stmt->bindParam(":txt", $text);

            if($comment_id != "0"){
                $stmt->bindParam(":parid", $comment_id);
            }

            $stmt->execute();

            http_response_code(201);

            echo(json_encode([
                    "id" => $pdo->lastInsertId(),
                    "parent_id" => $comment_id,
                    "username" => $_SESSION["username"],
                    "text" => $text
                ]));
        }
        catch(Exception $e){
            http_response_code(500);

            echo(json_encode([
                    "msg" => $e,
                ]));
        }
    }
    else{
        http_response_code(406);

        echo(json_encode([
                "msg" => "Not all variables are set."
            ]));
    }
}
else{
    http_response_code(401);

    echo(json_encode([
            "msg" => "You need to login in order to comment."
        ]));
}