<?php
    $message = "";
    
    if(isset($_GET["id"]) && isset($_GET["key"])){
        
        $id = $_GET["id"];
        $key = $_GET["key"];
        
        try{
            $sql = "SELECT id FROM users WHERE id=:id AND randnum=:key"; 
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(":id", $id);
            $stmt->bindParam(":key", $key);
            $stmt->execute();
        }
        catch(Exception $e){
            $message = $e;
        }

        if($stmt->rowCount() == 1){
            try{
                $sql = "UPDATE users SET isverified=1 , randnum=0 WHERE id=:id"; 
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(":id", $id);
                $stmt->execute();

                $message = "User is verified successfuly, now you can login.";
            }
            catch(Exception $e){
                $message = $e;
            }
        }
        else{
            echo("User not found.");
            die();
        }

    }
    else{
        echo("Some parameters are missing.");
        die();
    }
