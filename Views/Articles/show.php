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
      <br>
      <br>

    <h1 style="color:#008080"><?php echo $article["title"] ?></h1>

    <br>
    <br>
    <img src="..\..\Webroot\Img\download.jpeg" alt="image blog"/>

    <h5><i><?= $article["creation_date"]?>, <?= $article["edition_date"]?></i></h5>

    <div>
  <?php foreach($tags as $tag) {
    ?>
    <label><i><?= $tag["content"]?><i></label>
    <?php 
    } 
  ?>

</div>

    <br>
    <br>

    <article style="background-color:#C0C0C0"><?= $article["content"]?></article>
    </td>  
  </tr>
</table>

<br>

<div>
  <?php foreach ($comments as $comment) {
    ?>
    <label><i><?= $comment["creation_date"]?> , <?= $comment["edition_date"]?><i></label>
       <article class="form-control" name="content" rows="3"><?= $comment["content"]?></article><br>

    <?php 
    } 
  ?>

</div>

<br>
<br>
<form method="post" action="/PHP_Rush_MVC/Articles/createcomment/<?= $id ?>">
 <div class="form-group">
    <label for="exampleFormControlTextarea1">Votre commentaire </label>
    <textarea class="form-control" name="content" rows="3"></textarea>
    <br>
     <button type="submit" id="submit" class="btn btn-outline-info">Post my sweety comment</button>
  </div>
</form>
</div>
</div>


 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html> 