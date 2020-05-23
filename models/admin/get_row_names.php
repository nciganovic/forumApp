<?php
$table = "forum";

$sql = "SELECT COLUMN_NAME 
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_NAME = :p AND TABLE_SCHEMA = :f
        ORDER BY ORDINAL_POSITION";

$stmt = $pdo->prepare($sql);
$stmt->bindParam(":p", $_GET["name"]);
$stmt->bindParam(":f", $table);
$stmt->execute();
$all_row_names = $stmt->fetchAll();
