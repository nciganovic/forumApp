<?php 
require_once "models/posts/get_post.php";
require_once "models/comments/get_main_comments.php";
require_once "models/comments/get_replies.php";
?>

<h2 class="text-center"><?= $post[0]["title"] ?></h2>
<p><?= $post[0]["description"] ?></p>
<p><?= $post[0]["createdat"] ?></p>
<p><?= $post[0]["name"] ?></p>
<p><?= $post[0]["username"] ?></p>
<p><?= $post[0]["likes"] ?></p>

<form class="mt-5">
    <label for="exampleFormControlSelect2">Insert comment:</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    <button class="btn btn-success mt-3 cmt" type="button">Send</button>
</form>

<div id="comments" class="mt-5 mb-5 pb-5">
    
    <?php foreach($main_comments as $comment): ?>

        <div class="com-and-rep mt-4">
            <div class="comment">
                <p class="mb-0"> <?= $comment["username"] ?>, <?= $comment["createdat"] ?></p>
                <p class="mb-0"> <?= $comment["text"] ?></p>
                <a href="#" class="reply" commentid="<?= $comment["id"] ?>">reply</a>
            </div>

            <form id ="f-<?= $comment["id"] ?>" class="d-none comment-form">
                <label for="exampleFormControlSelect2">Insert comment:</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                <button class="btn btn-success mt-3 cmt" type="button">Send</button>
                <button class="btn btn-danger mt-3 cancel" formid="<?= $comment["id"] ?>" type="button">Cancel</button>
            </form>
        
            <div class="replies pl-5 mt-4 border-left">
                <?php get_replies($comment["id"], $pdo); ?>
            </div>
        </div>

    <?php endforeach ?>


    <!-- HARD CODED 
    <div class="com-and-rep mt-4">
        
        <div class="comment">
            <p class="mb-0">Level 1 comment</p>
            <a href="#">reply</a>
        </div>

        <div class="replies pl-5 mt-4 border-left">

            <div class="com-and-rep">

                <div class="comment">
                    <p class="mb-0">Level 2 comment</p>
                    <a href="#">reply</a>
                </div>

                <div class="replies pl-5 mt-4 border-left">

                    <div class="com-and-rep mt-4">
                        
                        <div class="comment">
                            <p class="mb-0">Level 3 comment</p>
                            <a href="#">reply</a>
                        </div>
                        
                        <div class="replies border-left">

                        </div>
                    </div>

                    <div class="com-and-rep mt-4">
                        <p class="mb-0">Level 3 comment</p>
                        <a href="#">reply</a>

                        <div class="replies border-left">

                        </div>
                    </div>

                    

                </div>

            </div>

        </div>
        
    </div>-->

</div>

<script src="assets/js/comment.js"></script>