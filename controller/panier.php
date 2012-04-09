<?php
/*
* panier.php
* created 5 avr. 2012
*/

/*
 * Cette page gère l'affichage du panier et la suppression de sandwichs dans le
 * panier.
 */

//TODO à faire
//TODO rajouter la gestion des suppressions de sandwiches
use modele\ProduitImp;

include 'view/vueBase.php';
include 'view/panier.php';

$displayDeleted = false;

if(isset($_POST['id']) && isset($_POST['nb'])) {
	$prod = new ProduitImp($_SESSION['user']->getDBFactory(), $_POST['id']);
	$_SESSION['user']->getBasket()->deleteProduct($prod);
	$displayDeleted = true;
}

writeHead($_SESSION['user']);
if($displayDeleted) {
	writeDeletedProduct($prod, $_POST['nb']);
}
writeContent($_SESSION['user']);
writeFoot($_SESSION['user']);