<?php 
$sql = "SELECT text FROM bio";
$stmt = $pdo->query($sql);
$stmt->execute();
$bio = $stmt->fetchAll();
