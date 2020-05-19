<?php 
require_once "models/posts/get_post.php";
require_once "models/comments/get_main_comments.php";
require_once "models/comments/get_replies.php";
require_once "models/upvotes/get_all_user_upvotes.php";
?>

<h1 postid="<?= $_GET["id"] ?>" class="text-center"><?= $post[0]["title"] ?></h1>
<ul>
    <li><?= $post[0]["id"] ?></li>
    <li><a href="index.php?page=post&id=<?= $post[0]["id"] ?>"> <?= $post[0]["title"] ?> </a></li>
    <li><?= $post[0]["name"] ?></li>
    <li><?= $post[0]["createdat"] ?></li>
    <li><?= $post[0]["username"] ?></li>
    <li>Likes: <span class="l-<?= $post[0]["id"] ?>"> <?= $post[0]["likes"] ?> </span></li>
</ul>

<!-- START Upvote -->
<?php if(isset($_SESSION["userid"])): ?>
    <?php $is_upvoted = false ?>
    <?php foreach($upvoted_posts as $up): ?>
        <?php if($up["postid"] == $post[0]["id"]): ?>
            <?php $is_upvoted = true ?>
            <?php break ?>
        <?php endif ?>
    <?php endforeach ?>

    <?php if(!$is_upvoted): ?>  
        <?php if($post[0]["userid"] != $_SESSION["userid"]): ?>
            <li><a href="#" class="upvote" post="<?= $post[0]["id"] ?>" user="<?= $_SESSION["userid"] ?>">Upvote</a></li>
        <?php else: ?>
            <li><a href="#">Your post</a></li>
        <?php endif ?>
    <?php else: ?>
        <li><a href="#" >Already upvoted</a></li>
    <?php endif ?>

<?php else: ?>
    <li><a href="#" class="set-alert">Upvote</a></li>
<?php endif ?>
<!-- END Upvote -->

<form id="f-0" class="mt-5">
    <label for="exampleFormControlSelect2">Insert comment:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <button class="btn btn-success mt-3 cmt" type="button" formid="0">Send</button>
</form>

<div id="comments" class="mt-5 mb-5 pb-5">
    
    <?php foreach($main_comments as $comment): ?>

        <div class="com-and-rep mt-4">
            <div class="comment">
                <p class="mb-0"> <?= $comment["id"] ?>,<?= $comment["username"] ?>, <?= $comment["createdat"] ?></p>
                <p class="mb-0"> <?= $comment["text"] ?></p>
                <a href="#" class="reply" commentid="<?= $comment["id"] ?>">reply</a>
            </div>

            <form id ="f-<?= $comment["id"] ?>" class="d-none comment-form">
                <label for="exampleFormControlSelect2">Insert comment:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button class="btn btn-success mt-3 cmt" formid="<?= $comment["id"] ?>" type="button">Send</button>
                <button class="btn btn-danger mt-3 cancel" formid="<?= $comment["id"] ?>" type="button">Cancel</button>
            </form>
        
            <div id ="r-<?= $comment["id"] ?>" class="replies pl-5 mt-4 border-left">
                <?php get_replies($comment["id"], $pdo); ?>
            </div>
        </div>

    <?php endforeach ?>

</div>

<script src="assets/js/comment.js"></script>
<script src="assets/js/upvotePost.js"></script>