<?php
require_once "../../config/connection.php";
require_once "get_col_names.php";

$all_col_names = get_col_names($pdo, $_POST["table-name"]);
$all_post_values = [];

foreach($all_col_names as $cn){
    if($cn[0] != "id"){
        $all_post_values[$cn[0]] = $_POST[$cn[0]];
    }
}

if(isset($_POST["create"])){
    $query = "INSERT INTO " . $_POST["table-name"] . " ( ";

    foreach($all_post_values as $key => $value){
        $query .= $key . " , ";
    }

    $query = substr($query, 0, -3);

    $query .= " ) ";
    $query .= " VALUES ( ";
    
    foreach($all_post_values as $key => $value){
        $query .= "'" . $value . "'" . " , ";
    }

    $query = substr($query, 0, -3);    
    $query .= " ) ";

    try{
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        header("Location: http://localhost/forumApp/index.php?page=table&width=1&table=" . $_POST["table-name"]);
    }
    catch(Exception $e){
        echo("Failed to create row. Some fields are left with bad type of data or blank.");
    }
}
else if(isset($_POST["edit"])){

    $query = "UPDATE " . $_POST["table-name"] . " SET ";

    foreach($all_post_values as $key => $value){
        $query .= $key . " = " . "'" . $value . "'" . " , ";
    }

    $query = substr($query, 0, -3);

    $query .= " WHERE  id = " .  "'" . $_POST["id"] . "'"; 

    try{
        $stmt = $pdo->prepare($query);
        $stmt->execute();

        header("Location: http://localhost/forumApp/index.php?page=table&width=1&table=" . $_POST["table-name"]);
    }
    catch(Exception $e){
        echo("Failed to create row. Some fields are left with bad type of data or blank.");
    }
}