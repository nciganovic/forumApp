<?php
$sql = "SHOW TABLES FROM forum";
$stmt = $pdo->query($sql);
$stmt->execute();
$all_tables = $stmt->fetchAll();
