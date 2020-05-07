<?php 
if(!isset($_SESSION["role"])){
    http_response_code(302);
    header("Location: "."http://".$_SERVER["HTTP_HOST"]."/forumApp/index.php"); #change in production
}