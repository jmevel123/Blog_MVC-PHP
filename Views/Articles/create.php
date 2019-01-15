<?php

include_once("../Controllers/TagsController.php");

$conarticle = new ArticlesController();
$articles = $conarticle->create();
$concategory = new CategoriesController();
$categories = $concategory->getCategoryName();
$contags = new TagsController();
$tags = $contags->createtag();


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Create</title>
  </head>
  <body>

    <div class="container">
         <h1>Hello writer! Let's create an article!</h1>

    <form method="post" action="create">
  <div class="form-group">
    <label>Title</label>
    <input type="text" name = "article_title" class="form-control" id="article_title" placeholder="Title" required>
  </div>
  <div class="form-group">
    <label>Article content</label>
    <textarea class="form-control" name="article_content" id="article_content" rows="3" required></textarea>
    <br>

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <label class="input-group-text" for="inputGroupSelect01">Category</label>
  </div>
  <select class="custom-select" name="category_name" required>
    <?php foreach ($categories as $category):?>
  <tr>
     <option name="category_name" required><?php echo $category["category_name"] ?></option>  

<?php endforeach; ?>

  
  </select>
</div>


 <div class="form-group">
    <label for="exampleFormControlTextarea1">Don't forget to add some tags!</label> <br>
    <textarea class="form-control" name="tag_content" rows="3" required></textarea>
    <br>
     

<br>
    <button type="submit" id="submit" class="btn btn-outline-info">Send my wonderful article</button>
  </div>
</form>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>


