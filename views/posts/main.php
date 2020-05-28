<?php
    $limit = 2;

    require_once "models/posts/get_first_n_posts.php";

    if(isset($_GET["ctg"])){
        $first_n_posts = get_first_n_posts($_GET["ctg"], $limit, 0, "n", $pdo);
    }
    else{
        $first_n_posts = get_first_n_posts(null, $limit, 0, "n", $pdo);
    }
?>

<?php if(isset($_SESSION["userid"])): ?>    
<div class="mt-3"><a class="p-3 btn btn-success" href="index.php?page=createpost&width=1">Create post</a></div>
<?php endif ?>

<div class="mt-3 mb-3">
    <label>Order by:</label>
    <select id="order">
        <option  selected="selected" value="n">Newest</option>
        <option value="o">Oldest</option>
    </select>
</div>
<div id="first-posts">
    <?php foreach($first_n_posts as $post): ?>
        <ul>
            <li><?= $post["id"] ?></li>
            <li><a href="index.php?page=post&id=<?= $post["id"] ?>"> <?= $post["title"] ?> </a></li>
            <li><?= $post["name"] ?></li>
            <li><?= $post["createdat"] ?></li>
            <li><?= $post["username"] ?></li>
            <li>Likes: <span class="l-<?= $post["id"] ?>"> <?= $post["likes"] ?> </span></li>
        </ul>
    <?php endforeach ?>
</div>
<div id="loaded-posts" class="mt-5 mb-5"></div>

<?php if(isset($_GET["ctg"])): ?>
    <p class="mt-5 mb-5"><a href="#" id="load-more" order="n" ctg="<?= $_GET["ctg"] ?>" offset="2">Load more</a></p>
<?php else: ?>
    <p class="mt-5 mb-5"><a href="#" id="load-more" offset="2" order="n">Load more</a></p>
<?php endif ?>    


<script src="assets/js/loadMore.js"></script>
<script src="assets/js/sort.js"></script>