<?php 
    require_once "models/user/redirect_unauth.php";
    require_once "models/user/get_user_data.php";
?>

<h1 class="text-center">Your info</h1>
<ul>
    <li>Username: <?= $user[0]["username"] ?></li>
    <li>Email: <?= $user[0]["email"] ?></li>
    <li>Bio: <?= stripslashes($user[0]["bio"]) ?></li>
    
    <?php if($user[0]["profileimg"]): ?>
        <img src="uploads/<?= $user[0]["profileimg"]?>" alt="profile image">
    <?php else: ?>
        <li>No image</li>
    <?php endif ?>

    <li><a href="index.php?page=changeprofile&width=1">Change info</a></li>
    <li><a href="index.php?page=changepsw&width=1">Change password</a></li>
</ul>

<?php if(isset($_SESSION["message"])): ?>
<p><?= $_SESSION["message"] ?></p>

<?php unset($_SESSION["message"]) ?>
<?php endif ?>
