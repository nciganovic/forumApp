<?php
$sql = "SELECT * FROM " . $_GET["name"];
$stmt = $pdo->query($sql);
$stmt->execute();
$all_rows = $stmt->fetchAll();
