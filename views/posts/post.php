<?php 
require_once "models/posts/get_post.php";

?>

<h2 class="text-center"><?= $post[0]["title"] ?></h2>
<p><?= $post[0]["description"] ?></p>
<p><?= $post[0]["createdat"] ?></p>
<p><?= $post[0]["name"] ?></p>
<p><?= $post[0]["username"] ?></p>
<p><?= $post[0]["likes"] ?></p>