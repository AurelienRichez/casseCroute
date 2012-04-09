<?php
/*
* produits.php
* created 5 avr. 2012
*/

/*
 * Page affichant les produits et gérant l'ajout de produits au panier.
 */


use modele\Panier;
use modele\ProduitImp;

include_once 'view/vueBase.php';
include_once 'view/produits.php';


$displayAdded = false;//vrai si un produit a été ajouté
$prod;
$nb;

if(isset($_POST['id']) AND isset($_POST['nb'])) {//Un produit a été ajouté
	$id = $_POST['id'];
	$nb = $_POST['nb'];
	$prod = new ProduitImp($_SESSION['user']->getDBFActory(), $id);
	
	$_SESSION['user']->getBasket()->addProduct($prod,$nb);
	$displayAdded = true;
}

writeHead($_SESSION['user']);
if($displayAdded) {
	writeAddedProduct($prod, $nb);
}
writeContent($_SESSION['user']);
writeFoot($_SESSION['user']);
