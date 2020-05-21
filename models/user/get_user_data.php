<?php
$sql = "SELECT username, email, bio, profileimg
        FROM users
        WHERE id = :u";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":u", $_SESSION["userid"]);
$stmt->execute();
$user = $stmt->fetchAll();
