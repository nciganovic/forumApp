<?php
require_once "../../config/connection.php";
require_once "get_all_rows.php";

if(isset($_POST["id"]) && isset($_POST["table"])){
    $id = $_POST["id"];
    $table = $_POST["table"];

    $sql = "DELETE FROM " . $table . " WHERE  id = :id ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    try{
        $stmt->execute();

        $all_rows = get_all_rows($pdo, $table);

        echo json_encode([
            "msg" => "Row deleted successfully.",
            "result" => "1",
            "allrows" => $all_rows
        ]);
    }
    catch(Exception $e){
        echo json_encode([
            "msg" => $e,
            "result" => "0"
        ]);
    }
}

