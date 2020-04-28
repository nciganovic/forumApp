<?php 

$sql = "SELECT * FROM categories";
$stmt = $pdo->query($sql);
$stmt->execute();
$allCategories = $stmt->fetchAll();
