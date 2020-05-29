<?php

session_start();

require_once "../../config/connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["title"]) && !empty($_POST["title"])){
        if(isset($_POST["desc"]) && !empty($_POST["desc"])){
            if(isset($_POST["ctg"]) && !empty($_POST["ctg"])){

                $title = trim($_POST["title"]);
                $desc = trim($_POST["desc"]);
                $ctg = trim($_POST["ctg"]);

                $errors = [];

                if(strlen($title) < 10){
                    array_push($errors, "Title is too short. Minimum 10 characters.");
                }
                else if(strlen($title) > 100){
                    array_push($errors, "Title is too long. Maximum 100 characters.");
                }
        
                if(strlen($desc) < 20){
                    array_push($errors, "Description is too short. Minimum 20 characters.");
                }
                else if(strlen($desc) > 2000){
                    array_push($errors, "Description is too long. Maximum 2000 characters.");
                }
        
                if($ctg == "0"){
                    array_push($errors, "You need to select category.");
                }

                if(count($errors) > 0){
                    http_response_code(406);

                    echo(json_encode([
                        "msg" => $errors
                    ]));
                }
                else{
                    //Insert post
                    try{
                        $sql = "INSERT INTO posts (title, description, userid, categoryid) VALUES(:title, :desc, :uid, :ctg)";
                        $stmt = $pdo->prepare($sql);
                        $stmt->bindParam(":title", $title);
                        $stmt->bindParam(":desc", $desc);
                        $stmt->bindParam(":uid", $_SESSION["userid"]);
                        $stmt->bindParam(":ctg", $ctg);
                        $stmt->execute(); 
                        
                        http_response_code(201);

                        echo(json_encode([
                            "msg" => "success"
                        ]));
                    }
                    catch(Exception $e){
                        http_response_code(500);

                        echo(json_encode([
                            "msg" => $e
                        ]));
                    }
                    
                }
            }
            else{
                http_response_code(406);

                echo(json_encode([
                    "msg" => "Category is not selected"
                ]));
            }
        }
        else{
            http_response_code(406);

            echo(json_encode([
                "msg" => "Description is not set or empty"
            ]));
        }
    }
    else{
        http_response_code(406);

        echo(json_encode([
            "msg" => "Title is not set or empty"
        ]));
    }
}
    
