<?php

include_once("../Controllers/UsersController.php");

$create = new UsersController();


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

<h1 class="mb-4">Create new profile</h1>

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

<fieldset class="form-group">
    <div class="row">
      <legend class="col-form-label col-sm-2 pt-0">Group of user</legend>
      <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="group" id="gridRadios1" value="User" checked>
          <label class="form-check-label" for="gridRadios1">
            Normal users
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="group" id="gridRadios2" value="Writer">
          <label class="form-check-label" for="gridRadios2">
            Writer
          </label>
        </div>
        <div class="form-check disabled">
          <input class="form-check-input" type="radio" name="group" id="gridRadios3" value="Admin">
          <label class="form-check-label" for="gridRadios3">
            Administrator
          </label>
        </div>
      </div>
    </div>
  </fieldset>

<button class="btn btn-outline-primary" type="submit"> Create user </button>
             

</form>
</div>

</body>
</html>

            