<?php

//Fonction qui découpe l'URL, la stocke dans un array et fait la différenciation entre mode et méthode

class Router
{

	function parse()
	{
		//chopper l'URL en cours
		$url = trim($_SERVER['REQUEST_URI'], '/');

		//on l'a converti en array
		$params = explode("/", $url);

		//on enlève le premier élément du array car pas besoin
		array_shift($params);
		
		if($params == null)
		{
			$params[0] = "Default";
			$params[1] = "home";
		}
		else if(count($params) < 2)
		{
			$params[0] = "Errors";
			$params[1] = "notFound";
		}

		$args = [];
		array_push($params, $args);
	
		return $params;
	}
}


?>