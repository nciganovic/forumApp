<?php
function get_col_names($pdo, $table_name){
	$db = "forum";

	$sql = "SELECT COLUMN_NAME 
			FROM INFORMATION_SCHEMA.COLUMNS
			WHERE TABLE_NAME = :p AND TABLE_SCHEMA = :f
			ORDER BY ORDINAL_POSITION";

	$stmt = $pdo->prepare($sql);
	$stmt->bindParam(":p", $table_name);
	$stmt->bindParam(":f", $db);
	$stmt->execute();
	$all_row_names = $stmt->fetchAll();

	return $all_row_names;
}