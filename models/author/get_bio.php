<?php 
$sql = "SELECT text, img FROM bio";
$stmt = $pdo->query($sql);
$stmt->execute();
$bio = $stmt->fetchAll();
