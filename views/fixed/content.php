<div class="container">
    <div class="row">
        <div class="col-8">

            <?php if(isset($_GET["page"])): ?>

                <?php if($_GET["page"] == "search"): ?>

                    <?php include_once "views/posts/search.php"; ?>

                <?php endif ?>

            <?php else: ?>

                <?php include_once "views/posts/main.php"; ?>

            <?php endif ?>

        </div>
        <div class="col-4">

            <?php require_once "views/categories/sidebar.php"; ?>
            
        </div>
    </div>
</div>