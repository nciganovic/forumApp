<?php 

    require_once "config/connection.php";

    require_once "views/fixed/head.php";
    require_once "views/fixed/navbar.php";

    if(!isset($_GET["page"])){
        require_once "views/fixed/content.php";
    }else{
        if($_GET["page"] == "login"){
            require_once "views/user/login.php";
        }
    }
    
    require_once "views/fixed/footer.php";

?>