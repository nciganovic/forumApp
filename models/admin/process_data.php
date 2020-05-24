<?php
require_once "../../config/connection.php";
require_once "get_col_names.php";

$all_col_names = get_col_names($pdo, $_POST["table-name"]);

if(isset($_POST["create"])){
    $all_post_values = [];

    foreach($all_col_names as $cn){
        if($cn[0] != "id"){
            $all_post_values[$cn[0]] = $_POST[$cn[0]];
            //array_push($all_post_values, $_POST[$cn[0]]);
        }
    }

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
        echo($e);
    }
}
else if(isset($_POST["edit"])){
    echo("edit is set!");
}