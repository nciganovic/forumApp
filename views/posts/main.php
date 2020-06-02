<?php
    $limit = 10;

    require_once "models/posts/get_first_n_posts.php";

    if(isset($_GET["ctg"])){
        $first_n_posts = get_first_n_posts($_GET["ctg"], $limit, 0, "n", $pdo);

        if(count($first_n_posts) == 0){
            header("Location: http://localhost/forumApp/index.php");
        }
    }
    else{
        $first_n_posts = get_first_n_posts(null, $limit, 0, "n", $pdo);
    }
?>

<div class="d-flex justify-content-between mt-4">
    <?php if(isset($_SESSION["userid"])): ?>    
    <div><a class="pl-3 pr-3 pt-2 pb-2 btn btn-success" href="index.php?page=createpost&width=1">Create post</a></div>
    <?php endif ?>

    <div>
        <select class="form-control" id="order">
            <option  selected="selected" value="n">Newest</option>
            <option  value="o">Oldest</option>
        </select>
    </div>
</div>

<div id="first-posts">
    <?php foreach($first_n_posts as $post): ?>
        <a class="text-dark text-decoration-none" href="index.php?page=post&id=<?= $post["id"] ?>">
            <div class="card mt-4 mb-4">
                <div class="card-header d-flex">
                    <div class="img mr-3">
                        <?php if($post["profileimg"]): ?>
                            <img class="rounded-circle" width="25px" src="uploads/<?= $post["profileimg"] ?>" alt="profile"/>
                        <?php else: ?>
                            <img class="rounded-circle" width="25px" src="uploads/user.jpg" alt="profile"/>
                        <?php endif ?>
                    </div>
                    <div class="username">
                        <?= $post["username"] ?>
                    </div>
                    
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p><?= $post["title"] ?></p>
                        <p> <i class="fas fa-star"></i> <?= $post["likes"] ?> </p>
                        <footer class="blockquote-footer"><?= $post["name"] ?> , <?= $post["createdat"] ?></footer>
                    </blockquote>
                </div>
            </div>
        </a>
    <?php endforeach ?>
</div>
<div id="loaded-posts"></div>

<?php if(isset($_GET["ctg"])): ?>
    <div class="mt-5 mb-5">
        <a href="#" id="load-more" class="btn btn-info w-100" order="n" ctg="<?= $_GET["ctg"] ?>" offset="10">Load more</a>
    </div>
<?php else: ?>
    <div class="mt-5 mb-5">
        <a href="#" id="load-more" class="btn btn-info w-100" offset="10" order="n">Load more</a>
    </div>
<?php endif ?>    


<script src="assets/js/loadMore.js"></script>
<script src="assets/js/sort.js"></script>