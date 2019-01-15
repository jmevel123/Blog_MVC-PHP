<?php


//include_once("../Controllers/ArticlesController.php");

$concategory = new CategoriesController();
$categories = $concategory->index();


?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>Categories' view</title>
  </head>
  <body>
    <div class="container">
    <h1>Let's see all of these beautiful categories!</h1>

    <br>
    <br>

<table class="table table-hover myTable">
<thead class="table-info">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Creation Date</th>
    <th>Edition Date</th>
    <th class="text-center">Options</th>
  </tr>
</thead>
  <?php foreach ($categories as $category):?>
  <tr>
     <td><?php echo $category["id"] ?></td>
     <td><?php echo $category["category_name"] ?></td> 
     <td><?php echo $category["creation_date"]?></td> 
     <td><?php echo $category["edition_date"]?></td>     
     <td class="text-right"> 

        <a class="btn btn-outline-success" href ="update/<?php echo $category["id"]?>"> Edit </a>
        <a class="btn btn-outline-primary" href ="show/<?php echo $category["id"]?>"> View Category </a>
        <a class="btn btn-outline-danger" href ="delete/<?php echo $category["id"]?>"> Delete </a>
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