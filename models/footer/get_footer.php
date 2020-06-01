<?php
$sql = "SELECT * FROM footer";
$stmt = $pdo->query($sql);
$stmt->execute();
$footer_data = $stmt->fetchAll();
