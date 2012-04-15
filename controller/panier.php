<?php
/*
* panier.php
* created 5 avr. 2012
*/

/*
 * Cette page gère l'affichage du panier et la suppression de sandwichs dans le
 * panier.
 */


include 'view/vueBase.php';
include 'view/panier.php';

$displayDeleted = false;
$displayValidated = false;

if(isset($_POST['id']) && isset($_POST['nb'])) {
		$prod = new ProduitImp($_SESSION['user']->getDBFactory(), $_POST['id']);
		$_SESSION['user']->getBasket()->deleteProduct($prod);
		$displayDeleted = true;
}

if(isset($_POST['validateOrder'])) {
	try {
	$_SESSION['user']->validateOrder();
	$displayValidated = true;
	}
	catch(Exception $e){
	//Erreur survenant si le panier est vide
	//TODO afficher éventuellement l'erreur
	}
}

writeHead($_SESSION['user']);
if($displayDeleted) {
	writeDeletedProduct($prod, $_POST['nb']);
}
if($displayValidated) {
	writeValidatedOrder($_SESSION['user']);
}
writeContent($_SESSION['user']);
writeFoot($_SESSION['user']);