<?php 
if(isset($_SESSION["role"])){
    if($_SESSION["role"] == "0"){
        http_response_code(302);
        header("Location: "."http://".$_SERVER["HTTP_HOST"]."/forumApp/index.php"); #change in production
    
    }
}
else{
    http_response_code(302);
    header("Location: "."http://".$_SERVER["HTTP_HOST"]."/forumApp/index.php"); #change in production
}