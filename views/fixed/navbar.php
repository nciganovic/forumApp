<nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
  <div class="container">
    <a class="navbar-brand text-light" href="index.php">Forum</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link text-light" href="index.php">Home</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link text-light" href="index.php?page=search">Search</a>
        </li>
        <?php if(!isset($_SESSION["role"])): ?>
            <li class="nav-item active">
                <a class="nav-link text-light" href="index.php?page=login&width=1">Login</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-light" href="index.php?page=register&width=1">Register</a>
            </li>
        <?php else: ?>
            <?php if($_SESSION["role"] == "1"): ?>
            <li class="nav-item active">
                <a class="nav-link text-light" href="index.php?page=dashboard&width=1">Dashboard</a>
            </li>
            <?php endif ?>

            <li class="nav-item active">
                <a class="nav-link text-light" href="index.php?page=profile&width=1"><?= $_SESSION["username"] ?></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-light" href="models/user/logout.php">Logout</a>
            </li>
        <?php endif ?>
        </ul>
    </div>
  </div>
</nav>