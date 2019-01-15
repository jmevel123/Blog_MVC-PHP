<?php

//dossier Models
require_once("../Config/db.php");


class ModelCategory
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
	function get_categories()
	{
		$sql = "select * from categories";
		$stmt = $this->bd->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	//récupère un article 
	function get_category($id)
	{
		$sql = "select * from categories where id=:id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	//créé un article
	function create_category($name)
	{
		$sql = "INSERT INTO categories(`category_name`, `creation_date`, `edition_date`) VALUES(:category_name,  NOW(), NOW())";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":category_name", $name);
		$result = $stmt->execute();
		return $result;
	}

	//modifie un article
	function edit_category($id, $name)
	{
		$sql = "UPDATE categories SET category_name = :category_name, edition_date =NOW() WHERE id = :id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":category_name", $name);
		$stmt->bindParam(":id", $id);
		$result = $stmt->execute();
		return $result;
	}

	//supprime un article 
	function delete_category($id)
	{
		$sql = "DELETE FROM categories WHERE id = :id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$result = $stmt->execute();
		return $result;
	}

	public function getCategoryNameBYID()
	{
		$sql = "SELECT category_name from categories";
		$stmt = $this->bd->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function get_product_category_name($category_name){
        $sql = "SELECT * FROM articles WHERE category_name = :category_name";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindParam(":category_name", $category_name);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);

        return $result;
    }
}


?>