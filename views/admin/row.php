<?php 
    require_once "models/user/redirect_unadmin.php";
    require_once "models/admin/get_row_names.php";
    require_once "models/admin/get_fk_data.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?= $_GET["type"] ?> row in <?= $_GET["table"] ?></h1>
        </div>
        <div class="col-12">
            
            <?php foreach($all_row_names as $rn): ?>

                <?php $fk_data = get_fk_data($_GET["table"], $rn[0], $pdo); ?>
                
                <?php if($fk_data == null): ?>
                    <div class="form-group">
                        <label><?= $rn[0] ?></label>
                        <input type="text" class="form-control" name="<?= $rn[0] ?>" placeholder="<?= $rn[0] ?>">
                    </div>
                <?php else: ?>
                    <div class="form-group">
                        <label><?= $rn[0] ?></label>
                        <select class="form-control" name="<?= $rn[0] ?>">
                            <?php foreach($fk_data as $data): ?>
                               <option value="<?= $data[0] ?>"> <?= $data[1] ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                <?php endif ?>
            <?php endforeach ?>
            
            <div class="mt-5 mb-5">
                <button class="btn btn-success">Create</button>
            </div>
        </div>
    </div>  
</div>