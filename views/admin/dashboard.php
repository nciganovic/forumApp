<?php 
    require_once "models/user/redirect_unadmin.php";
    require_once "models/admin/get_tables.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center">Admin dashboard</h1>
        </div>
        <div class="col-12">
            <ul>
                <?php foreach($all_tables as $table): ?>
                    <li>
                        <a href="index.php?page=table&width=1&name=<?= $table["Tables_in_forum"] ?>"> <?= $table["Tables_in_forum"] ?></a></li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>  
</div>