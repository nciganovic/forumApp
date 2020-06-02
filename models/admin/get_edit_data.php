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
            header("Location: http://localhost/forumApp/index.php");
        }
    }
    catch(Exception $e){
        header("Location: http://localhost/forumApp/index.php");
    }
    
}
else{
    header("Location: http://localhost/forumApp/index.php");
}
