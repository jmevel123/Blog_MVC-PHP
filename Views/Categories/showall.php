<?php

// $categories = new CategoriesController();
// $article = $categories->getArticleInCat();

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Categories view</title>
  </head>
  <body>
    <div class="container">
      <br>
      <br>

      <div class="row">


<?php foreach($categories as $category) { ?>

   <div class="col-sm-4">
     <div class="card">
        <div class="mb-3">
  <img class="card-img-top" src="../Webroot/Img/japonais.jpg" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title" style="color:#8B0000"><?php echo $category["category_name"] ?></h5>
    <a href="../Articles/showall/<?= $category["category_name"]?>" class="btn btn-outline-info">Go read articles!</a>
  </div>
</div>
</div>
<br>
</div>

<?php } ?>

</div>



 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html> 