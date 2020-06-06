<?php 
if(!isset($_SESSION["role"])){
    http_response_code(401);
    die("You are not authenticated.");
}