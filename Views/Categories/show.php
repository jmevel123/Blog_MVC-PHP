<?php

//include_once("../Controllers/ArticlesController.php");

$concategory = new CategoriesController();
$categories = $concategory->show($id);

//echo "boupidiboup";

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Articles view</title>
  </head>
  <body>
    <div class="container">
    <h1>Let's modify your already awesome article!</h1>

    <br>
    <br>

<table class="table table-hover myTable">
<thead class="table-info">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Creation date</th>
    <th>Edition date</th>

  </tr>
</thead>
  <tr>
     <td><?php echo $categories["id"] ?></td>
     <td><?php echo $categories["category_name"] ?></td>  
      <td><?php echo $categories["creation_date"]?></td> 
       <td><?php echo $categories["edition_date"]?></td>   
     <td class="text-right"> 
       
    </td>  
  </tr>

</table>
</div>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html> 