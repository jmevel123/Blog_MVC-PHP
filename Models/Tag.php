<?php

//dossier Models
require_once("../Config/db.php");


class ModelTag
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

	//récupère tous les tags
	function get_tags()
	{
		$sql = "select * from tags";
		$stmt = $this->bd->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	//récupère tous les tags par article
	function get_tags_by_article($article_id)
	{
		$sql = "select * from tags INNER JOIN tags_articles ON tags.id = tags_articles.tag_id WHERE tags_articles.article_id = :article_id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":article_id", $article_id);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

		return $result;
	}

	//récupère un tag 
	function get_tag($id)
	{
		$sql = "select * from tags where id=:id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	function associate_tag_article($id, $article_id)
	{
		$sql = "INSERT INTO tags_articles(`tag_id`, `article_id`) VALUES(:id, :article_id)";

		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->bindParam(":article_id", $article_id);
		$result = $stmt->execute();
		
		return $result;
	}

	//créé un tag
	function create_tag($content)
	{
		$sql = "INSERT INTO tags(`content`, `creation_date`, `edition_date`) VALUES(:content,  NOW(), NOW())";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":content", $content);
		$result = $stmt->execute();
		
		if($result)
		{
			var_dump($this->bd->lastInsertId());
			return $this->bd->lastInsertId();
		}
		else
			return false;
	}

	//modifie un tag
	function edit_tag($id, $content)
	{
		$sql = "UPDATE tags SET content = :content, edition_date = NOW() WHERE id = :id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":content", $content);
		$stmt->bindParam(":id", $id);
		$result = $stmt->execute();
		return $result;
	}

	//supprime un tag 
	function delete_tag($id)
	{
		$sql = "DELETE FROM tags WHERE id = :id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$result = $stmt->execute();
		return $result;
	}

}


?>