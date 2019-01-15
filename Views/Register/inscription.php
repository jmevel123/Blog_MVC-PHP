<?php

include_once("../Controllers/RegisterController.php");

$inscription = new RegisterController();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="main.js"></script>
</head>
<body>


<div class="container">
<form method="post">

    <br>
    <br>

<h1 class="text-center mb-4">Create your profile</h1>

<div class="form-group">
<label for="username">Username</label>
<input type="text" class="form-control" name="username" id="username" placeholder="Your pseudo" required><br>
</div>

<div class="form-group">
<label for="email">Email</label>
<input type="text" class="form-control" name="email" placeholder="example@gmail.com" required><br>
</div>

<div class="form-group">  
<label for="password">Password</label>    
<input type="password" class="form-control" name="password" placeholder="**********" pattern=.{8,20} required ><br>
</div>

<div class="form-group">
<label for="passwordconf">Password confirmation</label>
<input type="password" class="form-control" name="password_confirmation" placeholder="**********" pattern=.{8,20} required><br>
</div> 

<button class="btn btn-outline-primary" type="submit">Sign in</button>

<br>
<br>

<p> Do you have an account ? Login! <a href="login" class="btn btn-outline-info">HERE </a>
             

</form>
</div>

</body>
</html>

            