<?php 
    require_once "models/user/redirect_unadmin.php";
    require_once "models/admin/get_tables.php";
    require_once "models/log/count_visits.php";
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
                        <a href="index.php?page=table&width=1&table=<?= $table["Tables_in_forum"] ?>"> <?= $table["Tables_in_forum"] ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="col-12">
            <h2>Website vists percent</h2>
        </div>
        <div class="col-12">
            <ul>
                <?php foreach($urls_and_counts as $uc): ?>
                    <li><?= $uc["url"] ?> - <?= round(($uc["count"] / $total_visits) * 100 , 2) ?> % (<?= $uc["count"] ?>)</li>
                <?php endforeach ?>
            </ul>
        </div>
        <div class="col-12">
            <h2>Last 24h</h2>
            <ul>
                <?php foreach($urls_and_counts_ld as $uc): ?>
                    <li><?= $uc["url"] ?> - <?= $uc["count"] ?> </li>
                <?php endforeach ?>
            </ul>
        </div>
    </div>  
</div>