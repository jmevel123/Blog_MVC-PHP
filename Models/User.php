<?php

include_once("../Config/db.php");

class User
{
	public $bd;

	public function __construct()
	{	
		$pdo = new connect_DB("127.0.0.1", "root", "root", 3306, "php_MVC");
		$this->bd = $pdo->getConn();
    }
    
    public function getBd(){
        return $this->bd;
    }

    //RECUPERE ID D'UN USERNAME
    public function get_ID($username){

        $sql = "SELECT id FROM users WHERE username = :username";
        $stmt= $this->bd->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch();

        return $result['id'];
    }

	//AFFICHE TOUS LES USERS
	public function get_all_users()
	{
		$sql = "select * from users";
		$stmt = $this->bd->prepare($sql);
		$stmt->execute();
		$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	//AFFICHE LES INFORMATIONS D'UN USER
	public function get_user($id)
	{
		$sql = "select * from users where id=:id";
		$stmt = $this->bd->prepare($sql);
		$stmt->bindParam(":id", $id);
		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);
		return $result;
	}

	//CREER UN NOUVEAU USER
    public function create_users($username, $password, $email, $groupe = "User", $status = 0){

        $sql = "INSERT INTO users (`username`, `password`, `email`, `groupe`, `status_user`, `creation_date`, `edition_date`) 
                VALUES(:username, :password, :email, :groupe, :status_user, NOW(), NOW())"; 

        $stmt = $this->bd->prepare($sql); 
        $stmt->bindParam(":username", $username); 
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $hash);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":groupe", $groupe); 
        $stmt->bindParam(":status_user", $status);
        $result = $stmt->execute();
        return $result;
    }

    //EDIT UN USER
    public function update_users($id, $username, $password, $email, $groupe = "User"){
    
        // /*$username = $_POST['username'];
        // $password = $_POST['password'];
        // $email = $_POST['email'];
        // $groupe = $_POST['groupe'];
        // $status = $_POST['status'];
        
        $sql = "UPDATE users SET username = :username, password = :password, email = :email, groupe = :groupe, edition_date = NOW()
        WHERE id = :id"; 

        $stmt = $this->bd->prepare($sql); 
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":username", $username);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $hash);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":groupe", $groupe);

        $result = $stmt->execute();
        return $result;
    }

    //BAN UN USER
    public function ban_user($id){
        $sql = "UPDATE users SET status_user = :status
        WHERE id = :id"; 

        $status = 1;

        $stmt = $this->bd->prepare($sql); 
        $stmt->bindParam(":id", $id);;
        $stmt->bindParam(":status", $status);

        $result = $stmt->execute();
        return $result;
    }

    //UNBAN USER
    public function unban_user($id){
        $sql = "UPDATE users SET status_user = :status
        WHERE id = :id"; 

        $status = 0;

        $stmt = $this->bd->prepare($sql); 
        $stmt->bindParam(":id", $id);;
        $stmt->bindParam(":status", $status);

        $result = $stmt->execute();
        return $result;
    }

    //SUPPRIME UN USER
    public function delete_users($id){

        $sql = "DELETE FROM users WHERE id = :id"; 

            $stmt = $this->bd->prepare($sql); 
            $stmt->bindParam(":id", $id); 
            $result = $stmt->execute();
            return $result;    
    }

    //CHECK SI UN EMAIL EXISTE EN BDD
    public function exist_email($email){

        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt= $this->bd->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result){
            return TRUE;   
        }else{
            return FALSE; 
        }
        
    }
    
    //CHECK SI UN USERNAME EXISTE EN BDD
    public function exist_username($username){
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt= $this->bd->prepare($sql);
        $stmt->bindParam(":username", $username);
        $stmt->execute();
        $result = $stmt->fetch();

        if($result){
            return TRUE; 
        }
        else{
            return FALSE;
        }
    }

    //CHECK LE STATUT D'UN USER
    public function checkStatus($id){
        $sql =  "SELECT status_user FROM users WHERE id = :id";
        $stmt = $this->bd->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        return $result; 
    }

    //FONCTION RECUPERANT IDENTIFIANT POUR CONNEXION
    public function connect($email)
    {
        $sql = "SELECT *
            FROM users
            WHERE email = :email";

    $stmt = $this->bd->prepare($sql);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_OBJ);
    return $result;
    }

}


?>


