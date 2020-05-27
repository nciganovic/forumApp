<?php 
    require_once "models/author/get_bio.php";
?>

<h1 class="text-center"> Author </h1>
<p id="bio"> <?= $bio[0]["text"] ?> </p>

<a class="btn btn-info" href="models/author/export_word.php">Export</a>

<script src="assets/js/exportWord.js"></script>