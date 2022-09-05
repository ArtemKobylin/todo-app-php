<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div class="form-group text-center">
            <form class="form-inline my-2 my-lg-0 ml-4" action="/home">
                <button class='btn btn-outline-primary' type='submit'>Home</button>
            </form>
        </div>
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <span class="error text-danger">{{ errorMessage }}</span>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="submit" class="btn btn-info btn-m" value="Login">
                        </div>
                        <div id="register-link" class="text-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>