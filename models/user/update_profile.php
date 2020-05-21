<?php
if(isset($_POST["username"]) && isset($_POST["bio"])){
    $username = $_POST["username"];
    $bio = trim($_POST["bio"]);

    $isUsernameValid = preg_match('/^(?=.{5,15}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/', $username);

    if($isUsernameValid && strlen($bio) <= 255){
        $target_dir = "uploads/";
        
        $file_name = $_FILES["profileimg"]["name"];
        $tmp_name = $_FILES["profileimg"]["tmp_name"];
        $file_size = $_FILES["profileimg"]["size"];
        $file_type = $_FILES["profileimg"]["type"];

        $target_file = $target_dir . basename($file_name);

        if($file_type == "image/png" || $file_type == "image/jpg" || $file_type == "image/jpeg"){
            
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

            imagepng($new_image, "../../" .$target_file);

            
            /*
            $result = move_uploaded_file($empty_img, "../../" . $target_file);

            if ($result) {
                echo("img uploaded");
            }
            else{
                echo("error while uploading");
            }*/
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