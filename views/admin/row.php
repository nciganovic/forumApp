<?php 
    require_once "models/user/redirect_unadmin.php";
    require_once "models/admin/get_row_names.php";

    $db = "forum";
    $table = $_GET["table"];
    $col = "userid";

    $sql = "SELECT REFERENCED_TABLE_NAME, REFERENCED_COLUMN_NAME FROM information_schema.KEY_COLUMN_USAGE WHERE REFERENCED_TABLE_SCHEMA = :db AND TABLE_NAME = :table AND COLUMN_NAME = :col ";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":db", $db);
    $stmt->bindParam(":table", $table);
    $stmt->bindParam(":col", $col);
    $stmt->execute();
    $refTable = $stmt->fetchAll();

    var_dump($refTable);
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?= $_GET["type"] ?> row in <?= $_GET["table"] ?></h1>
        </div>
        <div class="col-12">
            
            <?php foreach($all_row_names as $rn): ?>
                <div class="form-group">
                    <label><?= $rn[0] ?></label>
                    <input type="text" class="form-control" name="<?= $rn[0] ?>" placeholder="<?= $rn[0] ?>">
                </div>
            <?php endforeach ?>
            
            <div class="mt-5 mb-5">
                <button class="btn btn-success">Create</button>
            </div>
        </div>
    </div>  
</div>