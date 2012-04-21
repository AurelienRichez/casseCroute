<?php


require_once 'include/loadClasses.php';

if(isset($_GET['page'])) {
	if(!preg_match('#(\.|/)#U',$_GET['page'])){
			
		if(file_exists('controller/'.$_GET['page'].'.php')){
			include_once 'controller/'.$_GET['page'].'.php';
		}
		else {
			header('HTTP/1.0 404 Not Found');
			echo 'Page inexistante <br /><a href="admin-accueil.html">Retour à l\'accueil</a>';//TODO faire une page mieux en cas d'erreur 404, avec à minima un lien vers l'accueil
			exit;
		}
	}
	else
		include_once 'controller/accueil.php';
}
else{
	include_once 'controller/accueil.php';
}
