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
        echo json_encode([
            "msg" => "New password is invalid. Must be between 5 and 25 characters. -s",
            "result" => "0"
        ]);
        $isValidPsw = false;
    }

    if($newPassword1 != $newPassword2){
        echo json_encode([
            "msg" => "New passwords are not identical. -s",
            "result" => "0"
        ]);
        $isValidPsw = false;
    }

    if($oldPassword == $newPassword2 || $oldPassword == $newPassword1){
        echo json_encode([
            "msg" => "Current and new password are same. -s",
            "result" => "0"
        ]);
        $isValidPsw = false;
    }

    if(strlen($oldPassword) < 5 || strlen($oldPassword) > 25){
        echo json_encode([
            "msg" => "Wrong current password. -s",
            "result" => "0"
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

                echo json_encode([
                    "msg" => "Password successfuly changed.",
                    "result" => "1"
                ]);
            }
            catch(Exception $e){
                echo json_encode([
                    "msg" => $e,
                    "result" => "0"
                ]);
            }
        }
        else{
            echo json_encode([
                "msg" => "Current password is not correct.",
                "result" => "0"
            ]);
        }
    }
    else{
        echo json_encode([
            "msg" => "User is not authenticated.",
            "result" => "0"
        ]);
    }
    
}
else{
    echo json_encode([
        "msg" => "Not all data is provided",
        "result" => "0"
    ]);
}

    