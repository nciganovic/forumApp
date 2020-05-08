<?php 
    require_once "models/categories/getCategories.php";
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="text-center mt-3">Create your post<h1>
        </div>
        <div class="col-8 m-auto">
            <form method="POST">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" class="form-control" name="title" placeholder="Title of your post...">
                </div>
                <div class="form-group">
                    <label for="desc">Description</label>
                    <textarea class="form-control" id="desc" placeholder="Description of your post..." rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for="ctg">Select category:</label>
                    <select class="form-control" id="ctg">
                        <option value="0">Select category</option>
                        <?php for($i = 0; $i < count($allCategories); $i++): ?>
                            <option value="<?= $allCategories[$i]["name"] ?>"> <?= $allCategories[$i]["name"] ?> </option>
                        <?php endfor ?>
                    </select>
                </div>

                <button type="button" id="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="message mt-3">
                
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/js/post.js"></script>