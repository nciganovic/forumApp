<?php
if(isset($_POST["username"]) && isset($_POST["bio"])){
    $username = $_POST["username"];
    $bio = trim($_POST["bio"]);

    $isUsernameValid = preg_match('/^(?=.{5,15}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/', $username);

    if($isUsernameValid && strlen($bio) <= 255){
        
        $file_name = $_FILES["profileimg"]["name"];
        $tmp_name = $_FILES["profileimg"]["tmp_name"];
        $file_size = $_FILES["profileimg"]["size"];
        $file_type = $_FILES["profileimg"]["type"];

        if($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg"){
            
            
            
        
        }
        else{
            echo("file is not image");
        }

       
       
    }
    else{
        echo("username or bio are not valid");    
    }

}
else{
    
    if(!isset($_POST["username"])){
        echo("username not set");
    }
    
    if(!isset($_POST["bio"])){
        echo("bio not set");
    }
    
}