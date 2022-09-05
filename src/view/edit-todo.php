<div id="login">
    <h3 class="text-center text-white pt-5">Add Todo</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <input type="hidden" id="tid" name="tid" value="{{tid}}">
                        <h3 class="text-center text-info"></h3>
                        <span class="error text-danger">{{ errorMessage }}</span>
                        <div class="form-group">
                            <label for="username" class="text-info">Username:</label><br>
                            <input type="text" name="username" id="username" class="form-control" value={{username}} disabled>
                        </div>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" value={{email}} disabled>
                        </div>
                        <div class="form-group">
                            <label for="title" class="text-info">Title:</label><br>
                            <input type="text" name="title" id="title" class="form-control" value={{title}}>
                        </div>
                        <div class="form-group">
                            <label for="sel1">Select list:</label>
                            {{#isDone}}
                            <select name="isDone" class="form-control" id="sel1" disabled>
                            {{/isDone}}
                            {{^isDone}}
                            <select name="isDone" class="form-control" id="sel1">
                            {{/isDone}}
                                {{#isDone}}
                                    <option value="1" selected>Done</option>
                                    <option value="0">In Progress</option>
                                {{/isDone}}
                                {{^isDone}}
                                    <option value="1">Done</option>
                                    <option value="0" selected>In Progress</option>
                                {{/isDone}}
                            </select>
                        </div>
                        <div class="form-group text-center">
                            <input type="submit" name="submit" class="btn btn-info btn-lg" value="Edit">
                        </div>
                        <div id="register-link" class="text-right">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>