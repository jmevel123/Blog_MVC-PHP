<?php


$conarticle = new ArticlesController();
$articles = $conarticle->delete($id);

echo "article supprimé !";


?>