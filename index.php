<?php
/*
 * fichier index.php
 */

/*
 * Ce fichier doit être placé dans un dossier avec autenthification par 
 * shibboleth afin d'avoir les variables d'environnement créées  
 */

//[TEST]
//TODO à retirer lors de la mise en production, juste pour créer les variables 
//nécessaires
use modele\UserImp;
use modele\DBFactorySqlite;

$_SERVER['HTTP_SHIB_GIVENNAME'] = 'Toto';
$_SERVER['HTTP_SHIB_SURNAME'] = 'Foo';
$_SERVER['REMOTE_USER'] = 'toto1';
include 'test/creationBaseTest.php';
//[/TEST]

require_once 'class/loadclasses.php';

session_start();

try{
	if(!isset($_SESSION['user'])) {
		$db = creer();
		remplirBaseTest($db);
		$dbFac = new DBFactorySqlite($db);//TODO à changer lors de la mise en production
		$testUser = new UserImp($dbFac, 'Toto', 'Foo', 'toto1');
			
		$_SESSION['user'] = $testUser;
	}
	
	if(isset($_GET['page'])) {
		if(!preg_match('#(\.|/)#U',$_GET['page'])){
			
			if(file_exists('controller/'.$_GET['page'].'.php')){
				include_once 'controller/'.$_GET['page'].'.php';
			}
			else {
				header('HTTP/1.0 404 Not Found');
				echo 'Page inexistante';//TODO éventuellement faire une page mieux en cas d'erreur 404, avec à minima un lien vers l'accueil
				exit;
			}
		}
		else
			include_once 'controller/accueil.php';
	}
	else{
		include_once 'controller/accueil.php';
	}
}
catch(Exception $e) {
	echo 'Une erreur est survenue, l\'erreur a été enregistrée';
	
	$file = fopen("error/log.txt","a");
	fputs($file,"\n----------------------\n");
	fputs($file, date("d-m-Y,H:i:s").":\n\t".$e->getMessage());
	fputs($file,"\n\texception lancée par :".$e->getFile());
	fputs($file,"\n\t ligne ".$e->getLine());
	fputs($file,"\n\t trace : \n".$e->getTraceAsString());
	fclose($file);
}
