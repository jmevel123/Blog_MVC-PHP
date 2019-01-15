<?php
//Dossier Controllers
require_once("../Models/Article.php");
require_once("../Models/Comment.php");
require_once("../Models/Tag.php");
//include_once("../Views/Articles/create.php");

class ArticlesController //extends AppController
{
	function __construct()
	{

	}

	//page principale des articles avec la liste des articles
	function index()
	{
		$article_model = new ModelArticle();
		$articles = $article_model->get_articles();

		foreach($articles as $key => $article)
		{

			$articles[$key]['title'] = htmlspecialchars($article['title']) . "\n";
		
				$articles[$key]['content'] = nl2br(htmlspecialchars($article['content'])) . "\n";
				$articles[$key]['category_name'] = nl2br(htmlspecialchars($article['category_name'])) . "\n";
	
		}

		include_once("../Views/Articles/index.php");
		return;		
	}

	//infos sur un article en particulier
	function show($id)
	{
		$article_model = new ModelArticle();
		$comment_model = new ModelComment();
		$tag_model = new ModelTag();
		$article = $article_model->get_article($id);
		$tag = $tag_model->get_tag($id);

		if(isset($article['title']) && isset($article['content']))
		{
				$article['title'] = htmlspecialchars($article['title']) . "\n";
				$article['content'] = htmlspecialchars($article['content']) . "\n";
				$article['creation_date'] = htmlspecialchars($article['creation_date']) . "\n";
				$article['edition_date'] = htmlspecialchars($article['edition_date']) . "\n";

				$comments = $comment_model->get_comments_by_article($id);

				$tags = $tag_model->get_tags_by_article($id);
				//$comment1['content'] = htmlspecialchars($comment1['content']) . "\n";

		}
		else
		{
			echo "Aucun contenu identifié" . "\n";
			return;
		}	

		include_once("../Views/Articles/show.php");
		return;
	}

	function showall()
	{
		$article_model = new ModelArticle();
		$articles = $article_model->get_articles();

		foreach($articles as $key => $article)
		{

			$articles[$key]['title'] = htmlspecialchars($article['title']) . "\n";
		
				$articles[$key]['content'] = nl2br(htmlspecialchars($article['content'])) . "\n";
				$articles[$key]['category_name'] = nl2br(htmlspecialchars($article['category_name'])) . "\n";
		}

		include_once("../Views/Articles/showall.php");
		return;
	}


	function create()
	{
		$articles = new ModelArticle();
		$tags = new ModelTag();
		include_once("../Views/Articles/create.php");
		
		if(isset($_POST['article_title']) && !empty($_POST["article_title"]))
		{
			$title = $this->secure_input($_POST['article_title']);

			if(isset($_POST['article_content']) && !empty($_POST['article_content']) && isset($_POST['category_name']) && !empty($_POST['category_name']))
			{
				$content = $this->secure_input($_POST['article_content']);
				$category_name = $this->secure_input($_POST['category_name']);
				//$articles->create_article($title, $content, $category_name);
				if(isset($_POST['tag_content']) && !empty($_POST['tag_content']))
				{
					$tag_content = $_POST["tag_content"];
					$tag_id = $tags->create_tag($tag_content);
					$article_id = $articles->create_article($title, $content, $category_name);
					$tags->associate_tag_article($tag_id, $article_id);
				}
				
			//header('location:PHP_Rush_MVC/Articles/create?p=create');
			echo "Article posté !" . "\n";
			header('Location: /PHP_Rush_MVC/Articles/index');
			}
				
		}	
			
	}

	function update($id)
	{
		$mt = new ModelArticle();
		$article = $mt->get_article($id);
		//header("Location: " . "/PHP_Rush_MVC/Articles/update");
		

		echo "starting update";
		if(!$article)
		{

			echo "Cet article n'existe pas !" . "\n";
			return;
		}

		if(isset($_POST['article_title']))
		{
			echo "title is set";
			$title = $this->secure_input($_POST['article_title']);

			if(isset($_POST['article_content']) && isset($_POST['category_name']))
			{

				echo "content and category is set";
				$content = $this->secure_input($_POST['article_content']);
				$category_name = $this->secure_input($_POST['category_name']);
			}
		

		$article = $mt->edit_article($id, $title, $content, $category_name);
							echo "Article modifié !" . "\n";
			header("Location: " . "/PHP_Rush_MVC/Articles/index");
		}	

		else
		{
			require_once("../Views/Articles/update.php");
			return;
		}		
	}

	function delete($id)
	{
		$articles = new ModelArticle();
		$article = $articles->get_article($id);

		if(isset($article['id']))
		{
			$article = $articles->delete_article($id);
			include_once("../Views/Articles/delete.php");
		}
		else
		{
			//alert("Compte supprimé !");
			header("Location: " . "/PHP_Rush_MVC/Articles/index");
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

	function createcomment($id)
	{
		$comments = new ModelComment();

		//include_once("../Views/Articles/show.php");
		
		if(isset($_POST['content']) && !empty($_POST["content"]))
		{
			$title = $this->secure_input($_POST['content']);

				$content = $this->secure_input($_POST['content']);
				$comments->create_comment($id, $content);
			//header('location:PHP_Rush_MVC/Categories/create?p=create');
			echo "Commentaire créé !" . "\n";
			header('Location: /PHP_Rush_MVC/Articles/show/' . $id);
				
		}	
			
	}

	function search($q)
	{
		$display = new ModelArticle();

		if(isset($_POST['q']) && !empty($_POST['q']))
		{
		    $articles = $display->searchQ($_POST['q']);
		    require_once("../Views/Articles/search.php");
		    return $articles;
		}

		else 
		$articles = $display->index();
    }

	
}


?>