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
            <h3 class="text-center mt-4">Tables</h3>
        </div>
        <div class="col-12">
            <div class="list-group">
                <?php foreach($all_tables as $table): ?>
                    <a class="list-group-item list-group-item-action" href="index.php?page=table&width=1&table=<?= $table["Tables_in_forum"] ?>"> <?= $table["Tables_in_forum"] ?></a>
                <?php endforeach ?>
            </div>
        </div>

        <div class="col-12">
            <h3 class="text-center mt-4">Page visit percent</h3>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <th>Link</th>
                    <th>Percent</th>
                    <th>Count</th>
                </thead>
                <tbody>
                    <?php foreach($urls_and_counts as $uc): ?>
                        <tr>
                            <td><?= $uc["url"] ?></td>
                            <td><?= round(($uc["count"] / $total_visits) * 100 , 2) ?> %</td>  
                            <td><?= $uc["count"] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        
        <div class="col-12">
            <h3 class="text-center mt-4">Last 24h</h3>
        </div>
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <th>Link</th>
                    <th>Count</th>
                </thead>
                <tbody>
                    <?php foreach($urls_and_counts_ld as $uc): ?>
                        <tr>
                            <td><?= $uc["url"] ?></td>
                            <td><?= $uc["count"] ?></td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
        
    </div>  
</div>