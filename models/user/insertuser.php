<?php
require_once "../../config/connection.php";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  return $data;
}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST["username"]) && !empty($_POST["username"])){
      if(isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["password2"]) && isset($_POST["password2"])){

        $username = test_input($_POST["username"]);
        $email = test_input($_POST["email"]);
        $password = test_input($_POST["password"]);
        $passwordR = test_input($_POST["password2"]);

        $isUsernameValid = preg_match('/^(?=.{5,15}$)(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/', $username);
        $isEmailValid = preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email);

        if($isUsernameValid){
          if($isEmailValid){

            if(strlen($password) > 4 && strlen($password) <= 25){
              if($password == $passwordR){

                $sql = "SELECT username, email FROM users WHERE username=:username OR email=:e";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":username", $username);
                $stmt->bindParam(":e", $email);
                $stmt->execute();

                
                
                if($stmt->rowCount() == 0){
                  $rand = bin2hex(random_bytes(32));
                  $pswHash = password_hash($password, PASSWORD_DEFAULT);

                  $link = "http://".$_SERVER["HTTP_HOST"]."/forumApp/index.php?page=auth&width=1";

                  try{
                    $sql = "INSERT INTO users (username, password, isverified, role, email, randnum) VALUES(:username, :password, 0, 0, :email, :randnum)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(":username", $username);
                    $stmt->bindParam(":password", $pswHash);
                    $stmt->bindParam(":email", $email);
                    $stmt->bindParam(":randnum", $rand);
                    $stmt->execute();
                  }
                  catch(Exception $e){
                    echo json_encode(["msg" => $e]); #remove in production
                  }
                  
                  $sql = "SELECT id FROM users WHERE username = :username";
                  $stmt = $pdo->prepare($sql);
                  $stmt->bindParam(":username", $username);
                  $stmt->execute();
                  $getId = $stmt->fetchAll();

                  $id = $getId[0]["id"];

                  $fullUrl = $link."&id=".$id."&key=".$rand;

                  $message = "Here is the link for confirmation: ".$fullUrl;

                  require_once "../../sendemail.php";

                  /*echo json_encode([
                    "msg" => "Account succesfully created! We sent you a confirmation link to your email. Click on it and you verification is complete.", 
                    "result" => "1"
                  ]);*/
                }
                else{
                  echo json_encode([
                    "msg" => "Username or email are already in use.", 
                    "result" => "0"
                  ]);

                }
                
              }
              else{
                echo json_encode([
                  "msg" => "Passwords are not identical.", 
                  "result" => "0"
                ]);

  
              } 
            }
            else{
              echo json_encode([
                "msg" => "Password is invalid. Must be between 5 and 25 characters.", 
                "result" => "0"
              ]);

            }

          }
          else{
            echo json_encode([
              "msg" => "Email is in wrong format.", 
              "result" => "0"
            ]);

          }
        }
        else{
          echo json_encode([
            "msg" => "Username is in wrong format. Valid formats are: user_15 , user.15 , user15 ", 
            "result" => "0"
          ]);

        }
       
      }
      else{
        echo json_encode([
          "msg" => "Email or passwords are not inserted.", 
          "result" => "0"
        ]);

      }
    }
    else{
      echo json_encode([
        "msg" => "Username is not inserted.", 
        "result" => "0"
      ]);

    }
  }
?>