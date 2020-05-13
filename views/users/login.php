<?php 
    require_once "models/user/redirect_auth.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12 mt-3">
            <h1 class="text-center">Login</h1>
        </div>
        <div class="col-8 m-auto">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" id="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                </div>
                <button type="button" id="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="message mt-3">
                
            </div>
        </div>

    </div>
</div>

<script src="assets/js/login.js"></script>