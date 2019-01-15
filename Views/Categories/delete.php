<?php


$concategory = new CategoriesController();
$categories = $concategory->delete($id);

echo "catégorie supprimée !";


?>