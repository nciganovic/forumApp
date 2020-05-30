<?php 
function get_first_n_posts($ctg, $limit, $offset, $order, $pdo){
	
	$ctg_query = "";
	$order_query = "";
	$offset_query = "";

	if($ctg != null){
		$ctg_query = " WHERE c.name = :ctg ";
	}
	if($order == "n"){
		$order_query = " DESC ";
	}
	if($offset != null){
		$offset_query = " OFFSET :offset ";
	}

	$sql = "SELECT p.id, p.title, p.createdat, c.name, u.username, u.profileimg, u.id as 'userid', COUNT(up.postid) AS 'likes'
			FROM posts p LEFT OUTER JOIN upvotepost up ON p.id = up.postid
			INNER JOIN categories c ON p.categoryid = c.id
			INNER JOIN users u ON p.userid = u.id
			" . $ctg_query . 
			"GROUP BY p.id, p.title, p.createdat, c.name, u.username, u.id
			ORDER BY p.createdat " . $order_query .  "
			LIMIT :limit " . $offset_query;


	$stmt = $pdo->prepare($sql);

	if($ctg != null){
		$stmt->bindValue(':ctg', $ctg);
	}
	if($offset != null){
		$stmt->bindValue(':offset', (int) $offset, PDO::PARAM_INT);
	}

	$stmt->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
	$stmt->execute();
	$first_n_posts = $stmt->fetchAll();

	return $first_n_posts;
}

