<?php 

function get_fk_data($table, $col, $pdo){
    $db = "forum";

    $sql = "SELECT REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME 
            FROM information_schema.KEY_COLUMN_USAGE 
            WHERE REFERENCED_TABLE_SCHEMA = :db 
            AND TABLE_NAME = :table 
            AND COLUMN_NAME = :col";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":db", $db);
    $stmt->bindParam(":table", $table);
    $stmt->bindParam(":col", $col);
    $stmt->execute();
    
    if($stmt->rowCount() > 0){
        $fk_info = $stmt->fetchAll();
        $sql = "SELECT * FROM " . $fk_info[0]["REFERENCED_TABLE_NAME"];
        $stmt = $pdo->query($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    else{
        return null;
    };
}
