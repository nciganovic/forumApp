<?php 
require_once "models/posts/get_post.php";
require_once "models/comments/get_main_comments.php";
require_once "models/comments/get_replies.php";
require_once "models/upvotes/get_all_user_upvotes.php";
?>

<div class="card mt-4 mb-4">
    <div class="card-header d-flex">
        <div class="img mr-3">
            <?php if($post[0]["profileimg"]): ?>
                <img class="rounded-circle" width="25px" src="uploads/<?= $post[0]["profileimg"] ?>" alt="profile"/>
            <?php else: ?>
                <img class="rounded-circle" width="25px" src="uploads/user.jpg" alt="profile"/>
            <?php endif ?>
        </div>
        <div class="username">
            <?= $post[0]["username"] ?>
        </div>
        
    </div>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <h2 postid="<?= $post[0]["id"] ?>"> <?= $post[0]["title"] ?> </h2>
            <p> <?= $post[0]["description"] ?> </p>
            <p> 
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
                            <a href="#" class="upvote text-dark text-decoration-none" post="<?= $post[0]["id"] ?>" user="<?= $_SESSION["userid"] ?>"> <i class="far fa-star"></i> </a>
                        <?php else: ?>
                            <i class="fas fa-star"></i> 
                        <?php endif ?>
                    <?php else: ?>
                        <a href="#" class="text-dark text-decoration-none"> <i class="fas fa-star"></i> </a>
                    <?php endif ?>

                <?php else: ?>
                    <a href="#" class="set-alert text-dark text-decoration-none"> <i class="far fa-star"></i> </a>
                <?php endif ?>
                <!-- END Upvote -->
 
                <span class="l-<?= $post[0]["id"] ?>"> <?= $post[0]["likes"] ?> </span>
             </p>
            <footer class="blockquote-footer"><?= $post[0]["name"] ?> , <?= $post[0]["createdat"] ?></footer>
        </blockquote>
    </div>
</div>

<form id="f-0" class="mt-5">
    <label for="exampleFormControlSelect2">Insert comment:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <button class="btn btn-success mt-3 cmt" type="button" formid="0">Send</button>
</form>

<div id="comments" class="mt-5 mb-5 pb-5">
    
    <?php foreach($main_comments as $comment): ?>

        <div class="com-and-rep mt-4">
            <div class="comment">
                <small class="mb-0"><?= $comment["username"] ?> <?= $comment["createdat"] ?></small>
                <p class="mb-0 p-3 bg-comment rounded"> <?= $comment["text"] ?></p>
                <a href="#" class="reply" commentid="<?= $comment["id"] ?>"><small>reply</small></a>
            </div>

            <form id ="f-<?= $comment["id"] ?>" class="d-none comment-form">
                <label for="exampleFormControlSelect2">Insert comment:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button class="btn btn-success mt-3 mr-3 cmt" formid="<?= $comment["id"] ?>" type="button">Send</button>
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