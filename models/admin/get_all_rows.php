<?php
$sql = "SELECT * FROM " . $_GET["table"];
$stmt = $pdo->query($sql);
$stmt->execute();
$all_rows = $stmt->fetchAll();
