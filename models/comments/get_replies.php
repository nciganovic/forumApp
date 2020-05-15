<?php
function get_replies($parent_id, $pdo){
    $sql = "SELECT c.id, u.username, c.parentid, c.createdat, c.text 
            FROM comments c INNER JOIN users u ON c.userid = u.id 
            WHERE c.parentid = :pid 
            ORDER BY c.createdat DESC";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":pid", $parent_id);
    $stmt->execute();

    $rows = $stmt->rowCount();
    
    if($rows > 0){
        $com = $stmt->fetchAll();

        foreach($com as $c){
            echo '<div class="com-and-rep mt-4">';
                echo '<div class="comment">';
                    echo '<p class="mb-0">'.$c["username"].','.$c["createdat"].'</p>';
                    echo '<p class="mb-0">'.$c["text"].'</p>';
                    echo '<a href="#">reply</a>';
                echo '</div>';

                echo '<div class="replies pl-5 mt-4 border-left">';
                    get_replies($c["id"], $pdo);
                echo '</div>';
            echo '</div>';
        }   
    }
}