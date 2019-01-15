<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

    <title>Articles view</title>
  </head>
  <body>
    <div class="container">
    <h1>Let's see all of these beautiful articles!</h1>

    <br>
    

     <?php if(isset($_SESSION["groupe"]) && $_SESSION["groupe"] != "User") : ?>
    <a class="btn btn-primary" href ="/PHP_Rush_MVC/Articles/create/"> Create new article </a>
    <?php endif; ?>

    <br>
    <br>


<table class="table table-hover myTable">
<thead class="thead-dark">
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Content</th>
    <th>Creation Date</th>
    <th>Edition Date</th>
    <th>Category</th>
    <th class="text-center">Options</th>
  </tr>
</thead>
  <?php foreach ($articles as $article):?>
  <tr>
     <td><?php echo $article["id"] ?></td>
     <td><?php echo $article["title"] ?></td> 
     <td><?php echo $article["content"]?></td> 
     <td><?php echo $article["creation_date"]?></td> 
     <td><?php echo $article["edition_date"]?></td>     
    <td><?php echo $article["category_name"]?></td>  
     <td class="text-right"> 

        <a class="btn btn-outline-success" href ="/PHP_Rush_MVC/Articles/update/<?php echo $article["id"]?>"> Edit </a>
        <a class="btn btn-outline-primary" href ="/PHP_Rush_MVC/Articles/show/<?php echo $article["id"]?>"> View Article </a>
                <a class="btn btn-outline-danger" href ="/PHP_Rush_MVC/Articles/delete/<?php echo $article["id"]?>"> Delete </a>
    </td>  
  </tr>

<?php endforeach; ?>
</table>



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