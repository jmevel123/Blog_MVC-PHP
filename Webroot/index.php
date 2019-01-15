<?php
//dossier Webroot

//require_once("../Controllers/ArticlesController.php");
require_once("../Src/router.php"); //on appelle le routeur
require_once("../dispatcher.php");
require_once("../Config/core.php");

//on  choppe le tableau de params créé par le routeur

//on appelle le dispatcher
//on utilise la fonction dispatch() avec les params

$router = new Router();
$elems_to_dispatch = $router->parse();

session_start();

if(empty($_SESSION))
{
  if($_SERVER['REQUEST_URI'] != '/PHP_Rush_MVC/Register/login')
  {
    if($_SERVER['REQUEST_URI'] != '/PHP_Rush_MVC/Register/inscription')
    {
      header('location: /PHP_Rush_MVC/Register/login');
    }
  }
}



?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>
<body>

    <header>

<?php if(!empty($_SESSION)) : ?>

<nav class="navbar navbar-expand-lg navbar-light mb-3" style="background-color: #e3f2fd;">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/PHP_Rush_MVC/Articles/showall">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/PHP_Rush_MVC/Categories/showall">Categories</a>  
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/PHP_Rush_MVC/Users/show/<?=$_SESSION["id"]?>">Profile</a> 
       <?php  if(isset($_SESSION["groupe"]) && $_SESSION["groupe"] == "Admin") : ?>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Admin management
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/PHP_Rush_MVC/Articles/index">Articles</a>
          <a class="dropdown-item" href="/PHP_Rush_MVC/Categories/index">Categories</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/PHP_Rush_MVC/Users/index">Users</a>
        </div>
      </li>
      <?php endif; ?>
      <li class="nav-item">
        <a class="nav-link" href="/PHP_Rush_MVC/Contact/contact">Contact us</a> 
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="/PHP_Rush_MVC/Register/logout">Logout</a>
      </li>
    </ul>

    <form method="post" action="/PHP_Rush_MVC/Articles/search">
      <input class="form-control mr-sm-2" type="search" name="q"placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
    
  </div>
</nav>

<?php endif; ?>

</header>

<?php
$dispatcher = new Dispatcher();
$dispatcher->dispatch($elems_to_dispatch);

?>

<div class="footer-copyright text-center py-3">© 2018 Copyright:
  <a href="/PHP_Rush_MVC/Articles/showall"> Alcoolida.com</a>
</div>
    

 <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="http://localhost/PHP_Rush_MVC/Webroot/delete.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBM2ztAQugm4BID2w1QQf_5EvqrGaxCx8Y&callback=initMap"
  type="text/javascript"></script>

</body>
</html>