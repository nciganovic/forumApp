<?php
if(isset($_SESSION["userid"])){
    $sql = "SELECT postid FROM upvotepost WHERE userid = :userid";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":userid", $_SESSION["userid"]);
    $stmt->execute();
    $upvoted_posts = $stmt->fetchAll();
}
