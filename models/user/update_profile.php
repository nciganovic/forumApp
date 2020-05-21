<?php
session_start();
require_once "../../config/connection.php";

if(isset($_POST["username"]) && isset($_POST["bio"])){
    $username = $_POST["username"];
    $bio = trim($_POST["bio"]);

    $isUsernameValid = preg_match('/^(?=.{5,15}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/', $username);

    if($isUsernameValid && strlen($bio) <= 255){
        $target_dir = "uploads/";
        
        //Get basic info from img
        $file_name = $_FILES["profileimg"]["name"];
        $tmp_name = $_FILES["profileimg"]["tmp_name"];
        $file_size = $_FILES["profileimg"]["size"];
        $file_type = $_FILES["profileimg"]["type"];

        if($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg"){
            //Everything is valid, now upload and update
            
            //Create new file name
            $separate = explode(".", $file_name);   
            $extension = end($separate);
            $new_file_name = time() . "." . $extension; 
            $target_file = $target_dir . $new_file_name;

            //Resize image to 100x100
            list($width, $heigth) = getimagesize($tmp_name);
            
            $new_width = 100;
            $new_heigth = 100;

            if($file_type == "image/png"){
                $this_image = imagecreatefrompng($tmp_name);
            }
            else if($file_type == "image/jpg" || $file_type == "image/jpeg"){
                $this_image = imagecreatefromjpeg($tmp_name);
            }

            $empty_img = imagecreatetruecolor($new_width, $new_heigth);
            imagecopyresampled($empty_img, $this_image, 0, 0, 0, 0, $new_width, $new_heigth, $width, $heigth);
            $new_image = $empty_img;

            //Uplaod resized image
            if($file_type == "image/png"){
                $result = imagepng($new_image, "../../" .$target_file);
            }
            else if($file_type == "image/jpg" || $file_type == "image/jpeg"){
                $result = imagejpeg($new_image, "../../" .$target_file);
            }

            if ($result) {
                echo("img uploaded");
            }
            else{
                echo("error while uploading");
            }

            //Insert img name to database
            $sql = "UPDATE users SET profileimg = :pimg WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":pimg", $new_file_name);
            $stmt->bindParam(":id", $_SESSION["userid"]);
            $stmt->execute();
        
        }
        
        // Inset rest of info
        $sql = "UPDATE users 
                SET username = :u , bio = :bio  
                WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":u", $username);
        $stmt->bindParam(":bio", $bio);
        $stmt->bindParam(":id", $_SESSION["userid"]);

        try{
            $stmt->execute();
        }
        catch(Exception $e){
            echo($e);
        }
        
        //header("Location: http://". $_SERVER["SERVER_NAME"] . "/forumApp/index.php?page=profile&width=1");

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