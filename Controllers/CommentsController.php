<?php
//Dossier Controllers
require_once("../Models/Comment.php");
//include_once("../Views/Categories/create.php");

class CommentsController extends ModelComment//extends AppController
{
	function __construct()
	{

	}

	//page principale des Categories avec la liste des Categories
	function index()
	{
		$comments = new ModelComment();
		$comment1 = $comments->get_comments();

		foreach($comment1 as $key => $comment)
		{
			?>
			<textarea class="form-control" name="content" value="<?php
			$comment1[$key]['content'] = htmlspecialchars($comment['content']) . "\n";?>"rows="3"></textarea> <?php
		}

		include_once("../Views/Articles/show.php");
		return $comment1;		
	}

	//infos sur une catégorie en particulier
	function show($id)
	{
		$comments = new ModelComment();
		$comment1 = $comments->get_comment($id);

		if(isset($comment1['content']))
		{
				$comment1['content'] = htmlspecialchars($comment1['content']) . "\n";
				$comment1['creation_date'] = htmlspecialchars($comment1['creation_date']) . "\n";
				$comment1['edition_date'] = htmlspecialchars($comment1['edition_date']) . "\n";

		}
		else
		{
			echo "Aucun contenu identifié" . "\n";
			return;
		}	

		include_once("../Views/Categories/show.php");
		return $comment1;
	}


	function createcomment($id)
	{
		$comments = new ModelComment();
		//include_once("../Views/Articles/show.php");
		
		if(isset($_POST['content']) && !empty($_POST["content"]))
		{
			$content = $this->secure_input($_POST['content']);

				$content = $this->secure_input($_POST['content']);
				$comments->create_comment($id, $content);
			//header('location:PHP_Rush_MVC/Categories/create?p=create');
			echo "Commentaire créé !" . "\n";
			header('Location: /PHP_Rush_MVC/Articles/show');
				
		}	
			
	}

	function update($id)
	{
		$mt = new ModelComment();
		$comment = $mt->get_comment($id);
		//header("Location: " . "/PHP_Rush_MVC/Categories/update");
		
		if(!$comment)
		{

			echo "Ce commentaire'existe pas !" . "\n";
			return;
		}

		if(isset($_POST['content']))
		{
			$content = $this->secure_input($_POST['content']);
		
			$comments = $mt->edit_comment($id, $content);
			header("Location: " . "/PHP_Rush_MVC/Articles/show");
			echo "Commentaire modifié !" . "\n";
		}	

		else
		{
			require_once("../Views/Articles/show");
			return;
		}		
	}

	function delete($id)
	{
		$comments = new ModelComment();
		$comment = $comments->get_comment($id);

		if(isset($comment['id']))
		{
			$comment = $comments->delete_comment($id);
			include_once("../Views/Articles/show.php");
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