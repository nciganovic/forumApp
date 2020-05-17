<?php 

include_once "models/categories/getCategories.php";

?>

<ul>
<?php foreach($allCategories as $category): ?>
    <li>
        <a href="index.php?ctg=<?= $category["name"] ?>">
            <?= $category["name"] ?>
        </a>
    </li>
<?php endforeach ?>
</ul>