<?php
//Dossier Controllers
require_once("../Models/Tag.php");
//include_once("../Views/Categories/create.php");

class TagsController extends ModelTag//extends AppController
{
	function __construct()
	{

	}

	//page principale des Categories avec la liste des Categories
	function index()
	{
		$tags = new ModelTag();
		$tag1 = $tags->get_tags();

		foreach($tag1 as $key => $tag)
		{
			?>
			<textarea class="form-control" name="content" value="<?php
			$tag1[$key]['content'] = htmlspecialchars($tag['content']) . "\n";?>"rows="3"></textarea> <?php
		}

		include_once("../Views/Articles/show.php");
		return $tag1;		
	}

	//infos sur un tag en particulier
	function show($id)
	{
		$tags = new ModelTag();
		$tag1 = $tags->get_tag($id);

		if(isset($tag1['content']))
		{
				$tag1['content'] = htmlspecialchars($tag1['content']) . "\n";
				$tag1['creation_date'] = htmlspecialchars($tag1['creation_date']) . "\n";
				$tag1['edition_date'] = htmlspecialchars($tag1['edition_date']) . "\n";
		}
		else
		{
			echo "Aucun contenu identifié" . "\n";
			return;
		}	

		include_once("../Views/Articles/show.php");
		return $tag1;
	}


	function createtag()
	{
		$tags = new ModelTag();
		//include_once("../Views/Articles/show.php");
		
		if(isset($_POST['content']) && !empty($_POST["content"]))
		{
			$content = $this->secure_input($_POST['content']);

				$content = $this->secure_input($_POST['content']);
				$tags->create_tag($content);
			//header('location:PHP_Rush_MVC/Categories/create?p=create');
			echo "Tag créé !" . "\n";
			header('Location: /PHP_Rush_MVC/Articles/show');
		}	
			
	}

	function update($id)
	{
		$mt = new ModelTag();
		$tag = $mt->get_tag($id);
		//header("Location: " . "/PHP_Rush_MVC/Categories/update");
		
		if(!$tag)
		{
			echo "Ce tag n'existe pas !" . "\n";
			return;
		}

		if(isset($_POST['content']))
		{
			$content = $this->secure_input($_POST['content']);
		
			$tags = $mt->edit_tag($id, $content);
			header("Location: " . "/PHP_Rush_MVC/Articles/show");
			echo "Tag modifié !" . "\n";
		}	

		else
		{
			require_once("../Views/Articles/update.php");
			return;
		}		
	}

	function delete($id)
	{
		$tags = new ModelTag();
		$tag = $tags->get_tag($id);

		if(isset($tag['id']))
		{
			$tag = $tags->delete_tag($id);
			include_once("../Views/Articles/show");
		}
		else
		{
			//alert("Compte supprimé !");
			header("Location: " . "/PHP_Rush_MVC/Articles/show");
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

}


?>