<?php
if(isset($_GET["table"]) && isset($_GET["id"])){
    try{
        $sql = "SELECT * FROM " . $_GET["table"] .
        " WHERE id = :id ";

        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":id", $_GET["id"]);
        $stmt->execute();
        $edit_data = $stmt->fetchAll();

        if(count($edit_data) == 0){
            die("This row doesn't exist.");
        }
    }
    catch(Exception $e){
        die("This table doesn't exist.");
    }
    
}
else{
    die("Table parmeter is not set.");
}
