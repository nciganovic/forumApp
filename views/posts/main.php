<?php
    require_once "models/posts/getpost.php";
    require_once "models/upvotes/get_all_user_upvotes.php";
?>

<?php if(isset($_SESSION["userid"])): ?>    
<div class="mt-3"><a class="p-3 btn btn-success" href="index.php?page=createpost&width=1">Create post</a></div>
<?php endif ?>

<?php foreach($allPosts as $post): ?>
    <ul>
        <li><?= $post["id"] ?></li>
        <li><?= $post["title"] ?></li>
        <li><?= $post["name"] ?></li>
        <li><?= $post["createdat"] ?></li>
        <li><?= $post["username"] ?></li>
        <li>Likes: <span class="l-<?= $post["id"] ?>"> <?= $post["likes"] ?> </span></li>
        
        <?php if(isset($_SESSION["userid"])): ?>
            <?php $is_upvoted = false ?>
            <?php foreach($upvoted_posts as $up): ?>
                <?php if($up["postid"] == $post["id"]): ?>
                    <?php $is_upvoted = true ?>
                    <?php break ?>
                <?php endif ?>
            <?php endforeach ?>

            <?php if(!$is_upvoted): ?>  
                <?php if($post["userid"] != $_SESSION["userid"]): ?>
                    <li><a href="#" class="upvote" post="<?= $post["id"] ?>" user="<?= $_SESSION["userid"] ?>">Upvote</a></li>
                <?php else: ?>
                    <li><a href="#">Your post</a></li>
                <?php endif ?>
            <?php else: ?>
                <li><a href="#" >Already upvoted</a></li>
            <?php endif ?>

        <?php else: ?>
            <li><a href="#" class="set-alert">Upvote</a></li>
        <?php endif ?>
    </ul>
<?php endforeach ?>

<script src="assets/js/upvotePost.js"></script>
