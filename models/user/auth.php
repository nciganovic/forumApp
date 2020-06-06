<?php
    session_start();

    require_once "../../config/connection.php";

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["email"]) && isset($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["password"])){

        $email = $_POST["email"];
        $password = $_POST["password"]; #problem with \ in password
        $isEmailValid = preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $email);
        
        if($isEmailValid){

            if(strlen($password) > 4 && strlen($password) < 26){

            $sql = "SELECT id, username, password, role FROM users WHERE email = :email AND isverified=1";
            
                if($stmt = $pdo->prepare($sql)){

                    $stmt->bindParam(":email", $email);
                    $stmt->execute();
                    if($stmt->rowCount() == 1){
                    $users = $stmt->fetchAll();

                        if(password_verify($password, test_input($users[0]["password"]) )){

                            // Store data in session variables
                            $_SESSION["userid"] = $users[0]["id"];
                            $_SESSION["role"] = $users[0]["role"];
                            $_SESSION["username"] = $users[0]["username"];                            

                            http_response_code(202);

                            // Redirect depends on role
                            if($users[0]["role"] == 1){
                                echo(json_encode([
                                    "msg" => "Admin"
                                ]));
                            }
                            else{
                                echo(json_encode([
                                    "msg" => "Basic"
                                ]));
                            }
                            
                        }
                        else{
                            require_once "../mail/create_email.php";

                            $from = "Forum team";
                            $subject = "Login failed";
                            $message = "Login has failed at ".date('d/m/Y H:i:s', time());

                            $create_mail = create_email($from, $email, $subject, $message);

                            http_response_code(406);

                            if($create_mail->send()){
                                echo(json_encode([
                                    "msg" => "Password is invalid. Email sent to notify user."
                                ]));
                            }
                            else{
                                echo(json_encode([
                                    "msg" => "Password is invalid. Email failed to send."
                                ]));
                            }
                        }
                    }
                    else{
                        http_response_code(406);
                    
                        echo(json_encode([
                            "msg" => "This email doesnt exist."
                        ]));
                    }
                }
            }
            else{
            http_response_code(406);
            
            echo(json_encode([
                "msg" => "Wrong password."
            ]));
            }

        }
        else{
            http_response_code(406);
           
            echo(json_encode([
                "msg" => "Email is in wrong format."
            ]));
        }
        }
        else{
        http_response_code(406);

        echo(json_encode([
            "msg" => "Email or password are not inserted."
        ]));
        }
    }
    
    ?>

