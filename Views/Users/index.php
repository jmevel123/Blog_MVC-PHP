<?php


include_once("../Controllers/UsersController.php");

$display = new UsersController();
$users = $display->index();


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>Users view</title>
  </head>
  <body>
    <div class="container">
    <h1>Let's see all of these beautiful users!</h1>

    <br>
    <br>

    <a class="btn btn-primary" href ="/PHP_Rush_MVC/Users/create/"> Create new user </a>

    <br>
    <br>

<table class="table table-hover myTable">
<thead class="thead-dark">
  <tr>
    <th>ID</th>
    <th>Username</th>
    <th>Email</th>
    <th>Groupe</th>
    <th>Status</th>
    <th>Date of creation</th>
    <th>Update profil</th>
    <th class="text-center">Options</th>
  </tr>
</thead>
  <?php foreach ($users as $user):?>
  
  <tr <?php if($user['status_user'] == 1) echo "style='background-color:pink'"  ?>>
     <td><?php echo htmlspecialchars($user['id']) ?></td>      
     <td><?php echo htmlspecialchars($user['username']) ?></td>
     <td><?php echo htmlspecialchars($user['email']) ?></td> 
     <td><?php echo htmlspecialchars($user['groupe'])?></td> 
     <td><?php if($user['status_user'] == 1) echo "BAN" ?></td> 
     <td><?php echo htmlspecialchars($user['creation_date']) ?></td>   
     <td><?php echo htmlspecialchars($user['edition_date']) ?></td>   
     <td class="text-right"> 

        <a class="btn btn-outline-success" href ="/PHP_Rush_MVC/Users/update/<?php echo $user["id"]?>"> Update </a>
        <a class="btn btn-outline-primary" href ="/PHP_Rush_MVC/Users/show/<?php echo $user["id"]?>"> Show user </a>

        <?php if ($user["status_user"] == 0)  :?>
        <a class="btn btn-outline-warning" href ="/PHP_Rush_MVC/Users/ban/<?php echo $user["id"]?>"> Ban user </a>
        <?php else : ?>
        <a class="btn btn-outline-dark" href ="/PHP_Rush_MVC/Users/unban/<?php echo $user["id"]?>"> Unban user </a>
        <?php endif;?>
        <a class="btn btn-outline-danger" href ="/PHP_Rush_MVC/Users/delete/<?php echo $user["id"]?>"> Delete </a>
    </td>  
  </tr>

<?php endforeach; ?>
</table>
</div>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
$(document).ready( function () {
    $('.myTable').DataTable();
} );
</script>
</body>
</html> 