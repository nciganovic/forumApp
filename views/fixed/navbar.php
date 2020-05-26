<?php 
    require_once "models/menu/get_menu.php";

    $basic_menu = get_menu(2, $pdo); //what everyone sees regardless of auth
    $auth_menu = get_menu(1, $pdo);
    $unauth_menu = get_menu(0, $pdo);

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
  <div class="container">
    <a class="navbar-brand text-light" href="index.php">Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        
        <?php foreach($basic_menu as $b): ?>
            <li class="nav-item active">
                <a class="nav-link text-light" href="<?= $b["url"] ?>"> <?= $b["name"] ?> </a>
            </li>
        <?php endforeach ?>
        
        <?php if(!isset($_SESSION["role"])): ?>
            <?php foreach($unauth_menu as $a): ?>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="<?= $a["url"] ?>"> <?= $a["name"] ?> </a>
                </li>
            <?php endforeach ?>
        <?php else: ?>
            <?php if($_SESSION["role"] == "1"): ?>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="index.php?page=dashboard&width=1">Dashboard</a>
                </li>
            <?php endif ?>

            <?php foreach($auth_menu as $a): ?>
                <li class="nav-item active">
                    <a class="nav-link text-light" href="<?= $a["url"] ?>"> <?= $a["name"] ?> </a>
                </li>
            <?php endforeach ?>

        <?php endif ?>
        </ul>
    </div>
  </div>
</nav>