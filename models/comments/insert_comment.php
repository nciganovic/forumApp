<?php

if(isset($_SESSION["userid"])){
    if(isset($_POST["id"]) && isset($_POST["text"])){
        
        $id = $_POST["id"];
        $text = $POST["text"];

        $sql = "INSERT INTO comments ()";

    }
}
else{
    echo(json_encode([
        "msg" => "You need to login in order to comment.",
        "result" => "0"
        ]));
}