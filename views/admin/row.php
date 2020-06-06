<?php 
    require_once "models/user/redirect_unadmin.php";
    require_once "models/admin/get_col_names.php";
    require_once "models/admin/get_fk_data.php";

    if(isset($_GET["table"])){
        $all_col_names = get_col_names($pdo, $_GET["table"]);
    }
    else{
        die("Table parameter is not set.");
    }

    if(count($all_col_names) == 0){
        die("This row doesn't exist.");
    }
?>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center"><?= $_GET["type"] ?> row in <?= $_GET["table"] ?></h1>
        </div>
        <div class="col-12">

            <form method="POST" action="models/admin/process_data.php">
            
            <?php if($_GET["type"] == "create"): ?>

                <?php foreach($all_col_names as $cn): ?>

                    <?php if($cn[0] != "id"): ?>

                        <?php $fk_data = get_fk_data($_GET["table"], $cn[0], $pdo); ?> 

                        <?php if($fk_data == null): ?>
                            <div class="form-group">
                                <label><?= $cn[0] ?></label>
                                <input type="text" class="form-control" name="<?= $cn[0] ?>" placeholder="<?= $cn[0] ?>">
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label><?= $cn[0] ?></label>
                                <select class="form-control" name="<?= $cn[0] ?>">
                                    <?php foreach($fk_data as $data): ?>
                                        <?php if($cn[0] == "parentid"): ?>
                                            <!-- if rn is parentid then display text value -->
                                            <option value="<?= $data[0] ?>"> <?= $data["text"] ?> </option>
                                        <?php else: ?>
                                            <option value="<?= $data[0] ?>"> <?= $data[1] ?> </option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach ?>
                
                <input type="hidden" id="custId" name="table-name" value="<?= $_GET["table"] ?>">

                <div class="mt-5 mb-5">
                    <button type="submit" name="create" class="btn btn-success">Create</button>
                </div>
            
            <?php elseif($_GET["type"] == "edit"): ?>
                <?php require_once "models/admin/get_edit_data.php"; ?>

                <?php foreach($all_col_names as $cn): ?>

                    <?php if($cn[0] != "id"): ?>

                        <?php $fk_data = get_fk_data($_GET["table"], $cn[0], $pdo); ?> 

                        <?php if($fk_data == null): ?>
                            <div class="form-group">
                                <label><?= $cn[0] ?></label>
                                <input type="text" class="form-control" name="<?= $cn[0] ?>" value="<?= $edit_data[0][$cn[0]] ?>">
                            </div>
                        <?php else: ?>
                            <div class="form-group">
                                <label><?= $cn[0] ?></label>
                                <select class="form-control" name="<?= $cn[0] ?>">
                                    <option value="0">  Select option </option>
                                    <?php foreach($fk_data as $data): ?>
                                        <!-- Set default selected items -->
                                        <?php if($cn[0] == "parentid"): ?>
                                            <!-- if rn is parentid then display text value -->
                                            <?php if($data[0] == $edit_data[0][$cn[0]]): ?>
                                                <option selected="selected" value="<?= $data[0] ?>"> <?= $data["text"] ?> </option>
                                            <?php else: ?>
                                                <option value="<?= $data[0] ?>"> <?= $data["text"] ?> </option>
                                            <?php endif ?>

                                        <?php else: ?>
                                            
                                            <?php if($data[0] == $edit_data[0][$cn[0]]): ?>
                                                <option selected="selected" value="<?= $data[0] ?>"> <?= $data[1] ?> </option>
                                            <?php else: ?>
                                                <option value="<?= $data[0] ?>"> <?= $data[1] ?> </option>
                                            <?php endif ?>
                                            
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        <?php endif ?>
                    <?php endif ?>

                <?php endforeach ?>

                <input type="hidden" id="custId" name="table-name" value="<?= $_GET["table"] ?>">
                <input type="hidden" id="custId" name="id" value="<?= $_GET["id"] ?>">

                <div class="mt-5 mb-5">
                <button type="submit" name="edit" class="btn btn-success">Edit</button>
                </div>

            <?php endif ?>
            
            </form>
        </div>
    </div>  
</div>