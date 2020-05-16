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

            echo(json_encode([
                "msg" => "Insert successfull",
                "result" => "1"
                ]));
        }
        catch(Exception $e){
            echo(json_encode([
                "msg" => $e,
                "result" => "0"
                ]));
        }
    }
    else{
        echo(json_encode([
            "msg" => "Not all variables are set.",
            "result" => "0"
            ]));
    }
}
else{
    echo(json_encode([
        "msg" => "You need to login in order to comment.",
        "result" => "0"
        ]));
}