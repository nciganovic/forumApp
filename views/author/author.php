<?php 
    require_once "models/author/get_bio.php";
?>

<h1 class="text-center mt-3"> Author </h1>

<div class="col-12 d-flex mt-5">
    <img class="m-auto" src="assets/img/<?= $bio[0]["img"] ?>" alt="profile image" />
</div>

<p id="bio" class="text-center mt-5"> <?= $bio[0]["text"] ?> </p>

<div class="col-12 d-flex justify-content-center mt-5">
    <a class="btn btn-info" href="models/author/export_word.php">Export</a>
</div>


<script src="assets/js/exportWord.js"></script>