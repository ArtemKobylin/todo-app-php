<div id="login">
    <h3 class="text-center text-white pt-5">Add Todo</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info"></h3>
                        <span class="error text-danger">{{ errorMessage }}</span>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="title" class="text-info">Title:</label><br>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="submit" class="btn btn-info btn-lg" value="Create">
                        </div>
                        <div id="register-link" class="text-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>