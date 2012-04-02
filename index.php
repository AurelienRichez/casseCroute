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
//[/TEST]

include 'test/creationBaseTest.php';
include 'class/Modele/DBFactorySqlite.class.php';
include 'class/Modele/UserImp.class.php';

session_start();

$db = creer();
remplirBaseTest($db);
$dbFac = new DBFactorySqlite($db);
$testUser = new UserImp($dbFac, 'Toto', 'Foo', 'toto1');
	
$_SESSION['user'] = $testUser;

include 'controller/accueil.php';