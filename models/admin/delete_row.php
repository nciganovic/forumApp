<?php
require_once "../../config/connection.php";

if(isset($_POST["id"]) && isset($_POST["table"])){
    $id = $_POST["id"];
    $table = $_POST["table"];

    $sql = "DELETE FROM " . $table . " WHERE  id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    try{
        $stmt->execute();

        echo json_encode([
            "msg" => "Row deleted successfully.",
            "result" => "1",
            // data => $data
        ]);
    }
    catch(Exception $e){
        echo json_encode([
            "msg" => $e,
            "result" => "0"
        ]);
    }
}

