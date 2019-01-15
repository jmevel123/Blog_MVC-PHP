<?php

require_once("../Models/User.php");

class RegisterController{

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
    
    //FONCTION POUR S'ENREGISTREER POUR LA PREMIERE FOIS
    public function inscription()
    {
        include_once("../Views/Register/inscription.php");

        if(!empty($_POST)) 
        {
            extract($_POST); 
            $errors = array();

            if(strlen($username) < 3 || strlen($username) > 10) 
            {
                array_push($errors, "Invalid username, please retried with a username between 3 and 10 characters.\n");
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
            
                $create = $this->user->create_users($verif_username ,$verif_password ,$verif_email);
                echo "Profile created" . "\n";
                header('Location: /PHP_Rush_MVC/Articles/showall');                
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

    public function login()
    {

        if(!empty($_POST))
        {

            extract($_POST);

            $email = htmlspecialchars($email);
            $password = htmlspecialchars($password);

            $connect = $this->user->connect($email);
            
            if($connect)
            {
                if(password_verify($password, $connect->password))
                {
                    session_start();
                    $_SESSION["id"] = $connect->id;
                    $_SESSION["username"] = $connect->username;
                    $_SESSION["email"] = $connect->email;
                    $_SESSION["groupe"] = $connect->groupe;
                    $_SESSION["status"] = $connect->status;
                    $_SESSION["creation_date"] = $connect->creation_date;
                    
                    header('Location: /PHP_Rush_MVC/Articles/showall'); 
                }
                else
                {
                    echo "Wrong password or email";
                }
            }
        }
        include_once("../Views/Register/login.php");
    }

    

    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();
        setcookie("email","",time()-1);
        setcookie("username","",time()-1);
        setcookie("id","",time()-1);
        setcookie("admin","",time()-1);
        header("location: /PHP_Rush_MVC/Register/login");
    }
}