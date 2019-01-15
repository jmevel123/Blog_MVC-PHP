<?php


class Dispatcher
{
	/**
	* Fonction qui va recevoir le tableau qui vient du routeur
	* et va tenter d'exécuter la fonction indiquée en paramètre
	*/

	function dispatch($params)
	{
		$controller = $params[0];
		$method = $params[1];
		$id = $params[2];

		$controller .= "Controller"; //on appellera la classe ArticlesController (sur l'url il n'apparaît qu'Articles)

		$error = false;

		if(class_exists($controller))
		{
			$ctrl = new $controller;

			if(method_exists($controller, $method))
			{
				$ctrl->$method($id);
			}
			else
			{
				$error = true;
			}
		}
		else
		{
			$error = true;
		}

		if($error)
		{
			require_once("Views/Error/notFound.php");
		}
	}

}



?>