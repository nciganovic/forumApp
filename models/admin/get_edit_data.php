<?php
if(isset($_GET["table"]) && isset($_GET["id"])){
    $sql = "SELECT * FROM " . $_GET["table"] .
            " WHERE id = :id ";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $_GET["id"]);
    $stmt->execute();
    $edit_data = $stmt->fetchAll();
}
