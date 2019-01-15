<?php
//Dossier Controllers
require_once("../Models/Category.php");
//include_once("../Views/Categories/create.php");

class CategoriesController extends ModelCategory//extends AppController
{
	function __construct()
	{

	}

	//page principale des Categories avec la liste des Categories
	function index()
	{
		$categories = new ModelCategory();
		$category1 = $categories->get_categories();

		foreach($category1 as $key => $category)
		{
			$category1[$key]['category_name'] = htmlspecialchars($category['category_name']) . "\n";	
		}

		include_once("../Views/Categories/index.php");
		return $category1;		
	}

	//infos sur une catégorie en particulier
	function show($id)
	{
		$categories = new ModelCategory();
		$category1 = $categories->get_category($id);

		if(isset($category1['category_name']))
		{
				$category1['category_name'] = htmlspecialchars($category1['category_name']) . "\n";
				$category1['creation_date'] = htmlspecialchars($category1['creation_date']) . "\n";
				$category1['edition_date'] = htmlspecialchars($category1['edition_date']) . "\n";

		}
		else
		{
			echo "Aucun contenu identifié" . "\n";
			return;
		}	

		include_once("../Views/Categories/show.php");
		return $category1;
	}

	function showall()
	{
		$category_model = new ModelCategory();
		$categories = $category_model->get_categories();

		foreach($categories as $key => $category)
		{

			$category[$key]['category_name'] = htmlspecialchars($category['category_name']) . "\n";
		
		}

		include_once("../Views/Categories/showall.php");
		return;
	}


	function create()
	{
		$categories = new ModelCategory();
		include_once("../Views/Categories/create.php");
		
		if(isset($_POST['category_name']) && !empty($_POST["category_name"]))
		{
			$title = $this->secure_input($_POST['category_name']);

				$content = $this->secure_input($_POST['category_content']);
				$categories->create_category($title, $content);
			//header('location:PHP_Rush_MVC/Categories/create?p=create');
			echo "Catégorie créée !" . "\n";
			header('Location: /PHP_Rush_MVC/Categories/index');
				
		}	
			
	}

	function update($id)
	{
		$mt = new ModelCategory();
		$category = $mt->get_category($id);
		//header("Location: " . "/PHP_Rush_MVC/Categories/update");
		
		if(!$category)
		{

			echo "Cette catégorie n'existe pas !" . "\n";
			return;
		}

		if(isset($_POST['category_name']))
		{
			$name = $this->secure_input($_POST['category_name']);
		
			$categories = $mt->edit_category($id, $name);
			header("Location: " . "/PHP_Rush_MVC/Categories/index");
			echo "Catégorie modifiée !" . "\n";
		}	

		else
		{
			require_once("../Views/Categories/update.php");
			return;
		}		
	}

	function delete($id)
	{
		$categories = new ModelCategory();
		$category = $categories->get_category($id);

		if(isset($category['id']))
		{
			$category = $categories->delete_category($id);
			include_once("../Views/Categories/delete.php");
		}
		else
		{
			//alert("Compte supprimé !");
			header("Location: " . "/PHP_Rush_MVC/Categories/index");
			return;
		}
	}

	function secure_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function getCategoryName()
	{
		$categories = new ModelCategory();
		$category = $categories->getCategoryNameBYID();
		return $category;
	}

	function getArticleInCat()
	{
		$categories = new ModelCategory();
		$category = $categories->get_product_category_name($category_name);
		return $category;
	}

	
}


?>