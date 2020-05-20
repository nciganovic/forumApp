<?php
$sql = "SELECT username, email, bio, profileimg
        FROM users
        WHERE username = :u";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(":u", $_SESSION["username"]);
$stmt->execute();
$user = $stmt->fetchAll();