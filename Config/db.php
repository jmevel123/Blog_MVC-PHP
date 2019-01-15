<?php

//dossier Config

//fichier qui contient uniquement des fonctions pr manager la db
class connect_DB
{
	const ERROR_LOG_FILE = "error_log_file.log";
	private $bdd;

	function __construct($host, $username, $passwd, $port, $db)
	{
	    try
	    {
	        $this->bdd = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $username, $passwd);
	        $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
	    catch (Exception $e)
	    {
	        $content = "Connection failed:" .$e->getMessage()."\n";
	        file_put_contents(ERROR_LOG_FILE, $content, FILE_APPEND);
	        die("Connection failed: " . $e->getMessage());
	    }
	}

	function getConn()
	{
		return $this->bdd;
	}
}

?>