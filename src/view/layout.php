<!DOCTYPE html>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <form class="form-inline my-2 my-lg-0" action="/auth/login">
                {{^user}}
                <button class='btn btn-outline-success' type='submit'>Login</button>
                {{/user}}
            </form>

            <form class="form-inline my-2 my-lg-0" action="/auth/logout">
                {{#user}}
                <button class='btn btn-outline-warning' type='submit'>Logout</button>
                {{/user}}
            </form>

            <form class="form-inline my-2 my-lg-0 ml-4" action="/home">                
                <button class='btn btn-outline-primary' type='submit'>Home</button>                
            </form>
        </div>
    </nav>


    <div class="jumbotron">
        <h1 class="display-4">Hello</h1>
        <p class="lead">This is a simple Todo list</p>
        <hr class="my-4">
        <p class="lead">
        </p>
    </div>

    {{ body }}

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
</body>

</html>