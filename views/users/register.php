<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <h1 class="text-center">Register</h1>
        </div>
        <div class="col-8 m-auto">
            <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" id="email" class="form-control" aria-describedby="emailHelp" name="email" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Repeat password</label>
                    <input type="password" id="password2" class="form-control" name="password2" placeholder="Repeat password">
                </div>
                
                <button type="button" id="submit" class="btn btn-primary">Submit</button>
            </form>

            <div class="message mt-3">
                
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/js/register.js"></script>