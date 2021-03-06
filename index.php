<?php 
    session_start();

    require_once "config/connection.php";

    require_once "views/fixed/head.php";
    require_once "views/fixed/navbar.php";

    require_once "models/log/insert_log.php";
    require_once "models/footer/get_footer.php";

    //Pages that dont have side bar and take 100% width
    if(isset($_GET["page"]) && isset($_GET["width"])){
        
        if($_GET["page"] == "login"){
            
            require_once "views/users/login.php";
        
        }
        elseif($_GET["page"] == "register"){

            require_once "views/users/register.php";
        
        }
        elseif($_GET["page"] == "validate"){

            require_once "views/users/validate.php";

        }
        elseif($_GET["page"] == "createpost"){

            require_once "views/users/createpost.php";

        }
        elseif($_GET["page"] == "profile"){

            require_once "views/users/profile.php";

        }
        elseif($_GET["page"] == "changeprofile"){

            require_once "views/users/change_profile.php";

        }
        elseif($_GET["page"] == "changepsw"){

            require_once "views/users/change_password.php";

        }
        elseif($_GET["page"] == "dashboard"){

            require_once "views/admin/dashboard.php";

        }
        elseif($_GET["page"] == "table"){

            require_once "views/admin/table.php";

        }
        elseif($_GET["page"] == "row"){

            require_once "views/admin/row.php";

        }
        else{
            die("This page doesn't exist");
        }
    
    //Pages that user sidebar   
    }else{

        require_once "views/fixed/content.php";

    }
    
    require_once "views/fixed/footer.php";

?>