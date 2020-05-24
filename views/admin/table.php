<?php 
    require_once "models/user/redirect_unadmin.php";
    require_once "models/admin/get_all_rows.php";
    require_once "models/admin/get_col_names.php";

    $all_col_names = get_col_names($pdo, $_GET["table"]);
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?= $_GET["table"] ?></h1>
        </div>
        <div class="col-12">
            <table class="mt-5 mb-5 pb-5 pt-5 table table-bordered table-responsive">
                <thead>
                    <?php foreach($all_col_names as $cn): ?>
                    <th class="p-3">
                        <?= $cn[0] ?>
                    </th>
                    <?php endforeach ?>
                    <th class="p-3">
                        Update
                    </th>
                    <th class="p-3">
                        Delete
                    </th>
                </thead>

                <tbody>
                    <?php for($i = 0; $i < count($all_rows); $i++): ?>
                        <tr>
                        <?php for($y = 0; $y < count($all_rows[$i]) / 2; $y++): ?>
                        
                            <td class="p-3"> <?= $all_rows[$i][$y] ?> </td>
                            
                        <?php endfor ?>

                        <td class="p-3">
                            <a href="index.php?page=row&width=1&table=<?= $_GET["table"] ?>&type=edit&id=<?=$all_rows[$i]["id"]?>"> Update </a>
                        </td>
                        <td class="p-3">Delete</td>

                        </tr>
                    <?php endfor ?>
                </tbody>
            </table>
            
            <div class="mt-5 mb-5 pb-5">
                <a class="btn btn-success" href="index.php?page=row&width=1&table=<?= $_GET["table"] ?>&type=create">Create</a>
            </div>
        </div>
    </div>  
</div>