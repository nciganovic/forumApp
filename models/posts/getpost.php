<?php 

$sql = "SELECT p.id, p.title, p.createdat, c.name, u.username, u.id as 'userid' FROM posts p INNER JOIN categories c ON p.categoryid = c.id INNER JOIN users u ON p.userid = u.id ORDER BY p.createdat LIMIT 10";
$stmt = $pdo->query($sql);
$stmt->execute();
$allPosts = $stmt->fetchAll();
