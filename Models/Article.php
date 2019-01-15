<?php

//dossier Models
require_once("../Config/db.php");


class ModelArticle
{
	private $bd;

	function __construct()
	{	
		$pdo = new connect_DB("127.0.0.1", "root", "root", 3306, "php_MVC");
		$this->bd = $pdo->getConn();

	}

	/*function get_username()
	{
		$sql = "SELECT username FROM users "
	}*/

	//récupère tous les articles
	function get_articles()
	{
		$sql = "select * from articles ORDER BY creation_date DESC";
		$stmt = $this->bd->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	//récupère un article 
	function get_article($id)
	{
		$sql = "select * from articles where id=:id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	function associate_tag_article($id, $tag_id)
	{
		$sql = "INSERT INTO tags_articles(`tag_id`, `article_id`) VALUES(:tag_id, :id)";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":article_id", $article_id);
		$result = $stmt->execute();
		
		return $result;
	}

	//créé un article
	function create_article($title, $content, $category_name)
	{
		$sql = "INSERT INTO articles(`title`, `content`, `creation_date`, `edition_date`, `category_name`) VALUES(:title, :content, NOW(), NOW(), :category_name)";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":title", $title);
		$stmt->bindParam(":content", $content);
		$stmt->bindParam(":category_name", $category_name);
		$result = $stmt->execute();

		if($result)
		{
			var_dump($this->bd->lastInsertId());
			return $this->bd->lastInsertId();
		}
		else
			return false;
	}

	//modifie un article
	function edit_article($id, $title, $content, $category_name)
	{
		$sql = "UPDATE articles SET title = :title, content = :content, edition_date =NOW(), category_name= :category_name WHERE id = :id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":title", $title);
		$stmt->bindParam(":content", $content);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":category_name", $category_name);
		$result = $stmt->execute();
		return $result;
	}

	//supprime un article 
	function delete_article($id)
	{
		$sql = "DELETE FROM articles WHERE id = :id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$result = $stmt->execute();
		return $result;
	}

	function searchQ($q){
           
            $sql = "SELECT * FROM articles WHERE CONCAT(title, category_name) LIKE :q ORDER BY title ASC";

            $stmt = $this->bd->prepare($sql);
            $like = "%". $q . "%";
            $stmt->bindParam(":q", $like);
            $stmt->execute();
            $search = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $search;
    }

}


?>