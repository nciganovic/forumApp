<?php
    $limit = 2;

    if(isset($_GET["ctg"])){
        require_once "models/posts/get_ctg_posts.php";
    }
    else{
        require_once "models/posts/get_latest_posts.php";
    }
?>

<?php if(isset($_SESSION["userid"])): ?>    
<div class="mt-3"><a class="p-3 btn btn-success" href="index.php?page=createpost&width=1">Create post</a></div>
<?php endif ?>

<?php foreach($allPosts as $post): ?>
    <ul>
        <li><?= $post["id"] ?></li>
        <li><a href="index.php?page=post&id=<?= $post["id"] ?>"> <?= $post["title"] ?> </a></li>
        <li><?= $post["name"] ?></li>
        <li><?= $post["createdat"] ?></li>
        <li><?= $post["username"] ?></li>
        <li>Likes: <span class="l-<?= $post["id"] ?>"> <?= $post["likes"] ?> </span></li>
    </ul>
<?php endforeach ?>

<div id="loaded-posts" class="mt-5 mb-5"></div>

<p class="mt-5 mb-5"><a href="#" id="load-more" offset="2">Load more</a></p>

<script src="assets/js/loadMore.js"></script>