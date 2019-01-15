<?php

require_once("../Models/User.php");

class UsersController{

    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    //FONCTION POUR SECURISER LES DONNEES
    function secure_input($data)
	{
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

    //FONCTION POUR AFFICHER TOUS LES USERS SUR INDEX
    public function index()
    {
        $allUsers = $this->user->get_all_users();

        include_once("../Views/Users/index.php");
        return $allUsers;
    }

    //FONCTION POUR AFFICHER LES INFOS D'UN SEUL USER
    public function show($id)
    {
        $user = $this->user->get_user($id);

        include_once("../Views/Users/show.php");
        return;
    }

    //FONCTION POUR CREER UN UTILISATEUR EN TANT QU'ADMIN
    public function create()
    {

        if(!empty($_POST)) 
        {
            extract($_POST); 
            $errors = array();

            if(strlen($username) < 3 || strlen($username) > 10) 
            {
                array_push($errors, "Invalid username. Please retried with a username between 3 and 10 characters.\n");
            }
            if($this->user->exist_username($username))
            {
                array_push($errors, "Sorry, this username is already taken, please retry.\n");
            }
            if($this->user->exist_email($email))
            {
                array_push($errors, "Email is already taken..\n");
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                array_push($errors,"Sorry, your email is invalid\n");
            }

            if((strlen($password) < 8 || strlen($password) > 20) || ($password_confirmation != $password))
            {
                array_push($errors, "Invalid password or password confirmation\n");
            }

            if(empty($errors))
            {   
                $verif_username = $this->secure_input($username);
                $verif_email = $this->secure_input($email);
                $verif_password = $this->secure_input($password);
                $verif_group = $this->secure_input($group);
            
                $create = $this->user->create_users($verif_username ,$verif_password ,$verif_email, $verif_group);
                echo "User created" . "\n";
                header('Location: /PHP_Rush_MVC/Users/index');                
            }
            else
            {
                foreach ($errors as $error) {
                    echo $error;
                    echo "<br>";
                }
            }    
        }
        include_once("../Views/Users/create.php");
    }

    //FONCTION QUI UPDATE UN USER
    public function update($id)
    { 
        $user= $this->user->get_user($id);

        include_once("../Views/Users/update.php");
        

        if(!empty($_POST)) 
        {
            extract($_POST); 
            $errors = array();


            if(strlen($username) < 3 || strlen($username) > 10) 
            {
                array_push($errors, "Invalid username. Please retried with a username between 3 and 10 characters.\n");
            }
            if($old_username != $username)
            {
                if($this->user->exist_username($username))
                {
                    array_push($errors, "Sorry, this username is already taken, please retry.\n");
                }
            }
            if($old_email != $email)
            {
                if($this->user->exist_email($email))
                {
                    array_push($errors, "Email is already taken..\n");
                }
            }

            if(!filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                array_push($errors,"Sorry, your email is invalid\n");
            }

            if((strlen($password) < 8 || strlen($password) > 20) || ($password_confirmation != $password))
            {
                array_push($errors, "Invalid password or password confirmation\n");
            }

            if(empty($errors))
            {   
                $username = $this->secure_input($username);
                $email = $this->secure_input($email);
                $password = $this->secure_input($password);
                $group = $this->secure_input($groupe);                
            
                $create = $this->user->update_users($id, $username, $password, $email, $groupe);
                echo "User updated" . "\n";
                header('Location: /PHP_Rush_MVC/Users/index');                
            }
            else
            {
                foreach ($errors as $error) {
                    echo $error;
                    echo "<br>";
                }
            }    
        }   
    }

    //FONCTION POUR DELETE UN USER
    public function delete($id)
    {
        $user = $this->user->get_user($id);

        if(isset($user['id']))
		{
            $delete = $this->user->delete_users($id);
            header("Location: /PHP_Rush_MVC/Users/index");
		}
    }

    //FONCTION POUR BAN UN USER
    public function ban($id)
    {
        $user = $this->user->get_user($id);

        if(isset($user['id']))
		{
            $ban = $this->user->ban_user($id);
            header("Location: /PHP_Rush_MVC/Users/index");
		}
    }

    //FONCTION POUR UNBAN UN USER
    public function unban($id)
    {
        $user = $this->user->get_user($id);

        if(isset($user['id']))
		{
            $unban = $this->user->unban_user($id);
            header("Location: /PHP_Rush_MVC/Users/index");
		}
    }
}


?>