<?php 
    include_once "models/categories/getCategories.php";
?>

<ul>
<div class="list-group  mt-5">
    <?php foreach($allCategories as $category): ?>
        <?php if(isset($_GET["ctg"])): ?>
            <?php if($_GET["ctg"] == $category["name"]): ?>
                <a class="list-group-item list-group-item-action active" href="index.php?ctg=<?= $category["name"] ?>">
                    <?= $category["name"] ?>
                </a>
            <?php else: ?>
                <a class="list-group-item list-group-item-action" href="index.php?ctg=<?= $category["name"] ?>">
                    <?= $category["name"] ?>
                </a>
            <?php endif ?>
        <?php else: ?>
            <a class="list-group-item list-group-item-action" href="index.php?ctg=<?= $category["name"] ?>">
                <?= $category["name"] ?>
            </a>
        <?php endif ?>
    <?php endforeach ?>
</li>
</ul>