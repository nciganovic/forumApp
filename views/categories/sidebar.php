<?php 

include_once "models/categories/getCategories.php";

?>

<ul>
<?php foreach($allCategories as $category): ?>
    <li><?= $category["name"] ?></li>
<?php endforeach ?>
</ul>