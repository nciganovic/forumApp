<?php
session_start();
require_once "../../config/connection.php";

if(isset($_POST["oldPassword"]) && isset($_POST["newPassword1"]) && isset($_POST["newPassword2"])){
    //Check if data is valid
    $oldPassword = $_POST["oldPassword"];
    $newPassword1 = $_POST["newPassword1"];
    $newPassword2 = $_POST["newPassword2"];

    $isValidPsw = true;
    if(strlen($newPassword1) > 25 || strlen($newPassword1) < 5 || strlen($newPassword2) > 25 || strlen($newPassword2) < 5){
        http_response_code(406);
        
        echo json_encode([
            "msg" => "New password is invalid. Must be between 5 and 25 characters."
        ]);
        $isValidPsw = false;
    }

    if($newPassword1 != $newPassword2){
        http_response_code(406);
        
        echo json_encode([
            "msg" => "New passwords are not identical."
        ]);
        $isValidPsw = false;
    }

    if($oldPassword == $newPassword2 || $oldPassword == $newPassword1){
        http_response_code(406);
        
        echo json_encode([
            "msg" => "Current and new password are same."
        ]);
        $isValidPsw = false;
    }

    if(strlen($oldPassword) < 5 || strlen($oldPassword) > 25){
        http_response_code(406);

        echo json_encode([
            "msg" => "Wrong current password."
        ]);
        $isValidPsw = false;
    }
    

    if($isValidPsw && isset($_SESSION["userid"])){
        //Check if old password is correct

        $hashOldPassword = password_hash($oldPassword, PASSWORD_DEFAULT);
        
        $sql = "SELECT password FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $_SESSION["userid"]);
        $stmt->execute();
        $userPsw = $stmt->fetchAll();

        if(password_verify($oldPassword, $userPsw[0]["password"])){
            $hashNewPassword = password_hash($newPassword1, PASSWORD_DEFAULT);

            $sql = "UPDATE users 
                    SET password = :psw 
                    WHERE id = :userid";

            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":psw", $hashNewPassword);
            $stmt->bindParam(":userid", $_SESSION["userid"]);
            
            try{
                $stmt->execute();

                http_response_code(202);

                echo json_encode([
                    "msg" => "Password successfully changed."
                ]);
            }
            catch(Exception $e){
                http_response_code(500);

                echo json_encode([
                    "msg" => $e
                ]);
            }
        }
        else{
            http_response_code(406);

            echo json_encode([
                "msg" => "Current password is not correct."
            ]);
        }
    }
    else{
        http_response_code(401);

        echo json_encode([
            "msg" => "User is not authenticated."
        ]);
    }
    
}
else{
    http_response_code(406);

    echo json_encode([
        "msg" => "Not all data is provided"
    ]);
}

    