<?php
use modele\DBFactorySqlite;

use modele\ProduitImp;
use modele\UserImp;

require_once 'creationBaseTest.php';
require_once '../class/Modele/UserImp.class.php';
require_once '../class/Modele/ProduitImp.class.php';
require_once '../class/Modele/DBFactorySqlite.class.php';


$db = creer();
remplirBaseTest($db);

try{

$dbFac = new DBFactorySqlite($db);

$userTest = new UserImp($dbFac, 'Toto', 'Foo', 'toto1');

echo 'commandes future du client :<pre>';
print_r($userTest->getOrders());
echo '</pre>';

echo '<br /><br />';
echo 'derniere commande du client :<pre>';
print_r($userTest->getLastOrder());
echo '</pre>';

$userTest->getBasket()->addProduct(new ProduitImp($dbFac, 11));

echo '<br /><br />';
echo 'produits dans le panier du client :<pre>';
print_r($userTest->getBasket());
echo '</pre>';



}
catch (Exception $e) {
	$e->getTrace();
}