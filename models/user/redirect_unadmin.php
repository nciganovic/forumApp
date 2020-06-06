<?php 
if(isset($_SESSION["role"])){
    if($_SESSION["role"] == "0"){
        http_response_code(401);
        die("You are not authorized for this page."); #change in production
    
    }
}
else{
    http_response_code(401);
    die("You are not authorized for this page."); #change in production
}
