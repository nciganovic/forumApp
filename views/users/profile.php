<?php 
    require_once "models/user/redirect_unauth.php";
    require_once "models/user/get_user_data.php";
?>

<h1 class="text-center">Your info</h1>

<div class="container">
    <div class="row">
        <div class="col-12 mt-3 d-flex">
            <table class="table table-hover m-auto">
                <tr>
                    <td>Username</td>
                    <td><?= $user[0]["username"] ?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?= $user[0]["email"] ?></td>
                </tr>
                <tr>
                    <td>Bio</td>
                    <td><?= $user[0]["bio"] ?></td>
                </tr>
                <tr>
                    <td>Image</td>
                    <td>
                        <?php if($user[0]["profileimg"]): ?>
                            <img src="uploads/<?= $user[0]["profileimg"]?>" alt="profile image">
                        <?php else: ?>
                            No image
                        <?php endif ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="mt-3 pl-3">
            <a class="btn btn-info mr-3" href="index.php?page=changeprofile&width=1">Change info</a>
            <a class="btn btn-info" href="index.php?page=changepsw&width=1">Change password</a>
        </div>
        <div class="col-12">
            <?php if(isset($_SESSION["message"])): ?>
                <p class="text-center"><?= $_SESSION["message"] ?></p>
                <?php unset($_SESSION["message"]) ?>
            <?php endif ?>
        </div>
    </div>
</div>

