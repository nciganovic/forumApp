<?php 
    require_once "models/user/redirect_unauth.php";
    require_once "models/user/get_user_data.php";
?>

<div class="container">
    <div class="row">
        <div class="col-12">
        <h1 class="text-center">Change your info</h1>
        <form method="POST" action="#">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" value="<?= $user[0]["username"] ?>">
            </div>

            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" id="email" value="<?= $user[0]["email"] ?>">
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="bio" rows="3"> <?= $user[0]["bio"] ?> </textarea>
            </div>   

            <?php if($user[0]["profileimg"]): ?>
                <img src="<?php $user[0]["profileimg"]?>" alt="profile image">
            <?php else: ?>
                <p>You dont have profile picture</p>
            <?php endif ?>
            
            <div class="form-group">
                <label for="profileimg">Profile image</label>
                <input type="file" class="form-control-file" id="profileimg">
            </div>

            <button type="submit" class="btn btn-success">Change info</button>
        </form>  
        </div>
    </div>
</div>
