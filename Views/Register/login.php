<?php

include_once("../Controllers/RegisterController.php");

$inscription = new RegisterController();


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <br>
    <br>

    <h1 class="text-center mb-4">Login</h1>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

<div class="container">


    <form method="post">
    <div class="form-group">
        Email: <input class="form-control" type="text" name="email" placeholder="exemple@gmail.com"><br>
    </div>
    <div class="form-group">
        Password: <input class="form-control" type="password" name="password"><br>
    </div>
    <label for="remerber-me" class="form-check-label">Remember me</label>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remember" value="remember-be"><br>
    </div>
     <input class="btn btn-primary" type="submit" href="PHP_Rush_MVC/Articles/index" value="Log in">
    <p> Don't have an account? Sign up <a href="inscription" class="btn btn-outline-info">HERE </a>
    <p> <a href="forgotpassword.php"> Forgot your password? </a>

    </form>
    </div>

</footer>
</body>
</html>