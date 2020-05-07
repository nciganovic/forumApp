<?php
    require_once "redirect_unauth.php";
    
    session_start();
    unset($_SESSION["role"]);  
    unset($_SESSION["username"]);
    unset($_SESSION["userid"]);
    header("Location: "."http://".$_SERVER["HTTP_HOST"]."/forumApp/index.php"); #change in production