<?php
function get_menu($auth_lvl, $pdo){
    $sql = "SELECT name, url FROM menu WHERE auth = :a";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":a", $auth_lvl);
    $stmt->execute();
    $data = $stmt->fetchAll();
    return $data;
}

