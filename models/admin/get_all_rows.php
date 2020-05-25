<?php
function get_all_rows($pdo, $table){
    $sql = "SELECT * FROM " . $table;
    $stmt = $pdo->query($sql);
    $stmt->execute();
    $all_rows = $stmt->fetchAll();
    return $all_rows;    
}
