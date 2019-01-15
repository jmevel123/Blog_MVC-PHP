<?php

//dossier Models
require_once("../Config/db.php");


class ModelComment
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
	function get_comments()
	{
		$sql = "select * from comments";
		$stmt = $this->bd->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	//récupère tous les articles
	function get_comments_by_article($article_id)
	{
		$sql = "select * from comments where article_id=:article_id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":article_id", $article_id);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	//récupère un commentaire 
	function get_comment($id)
	{
		$sql = "select * from comments where id=:id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	//créé un article
	function create_comment($id, $content)
	{
		$sql = "INSERT INTO comments(`content`, `creation_date`, `edition_date`, `article_id`) VALUES(:content,  NOW(), NOW(), :id)";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":content", $content);
		$stmt->bindParam(":id", $id);
		$result = $stmt->execute();
		return $result;
	}

	//modifie un article
	function edit_comment($id, $content)
	{
		$sql = "UPDATE comments SET content = :content, edition_date = NOW() WHERE id = :id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":content", $content);
		$stmt->bindParam(":id", $id);
		$result = $stmt->execute();
		return $result;
	}

	//supprime un article 
	function delete_comment($id)
	{
		$sql = "DELETE FROM comments WHERE id = :id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$result = $stmt->execute();
		return $result;
	}

}


?>