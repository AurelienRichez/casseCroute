<?php


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

$com = $userTest->getOrder(2);
echo '<br /><br />';
echo 'requete de commande d\'id 2  :<pre>';
var_dump($com);
echo '</pre>';


/*  
// La fonction CURDATE ne semble pas exister avec sqlite donc il est nécessaire 
// d'avoir une base de donnée mysql pour faire ce test.
$userTest->deleteOrder($userTest->getLastOrder()->getID());
echo '<br /><br />';
echo 'commandes du client après supression de la dernière commande :<pre>';
print_r($userTest->getOrders());
echo '</pre>';
//*/

}
catch (Exception $e) {
	$e->getTrace();
}