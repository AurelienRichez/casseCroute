<?php
use modele\ProduitImp;
use modele\UserImp;

require_once 'creationBaseTest.php';
require_once '../class/Modele/UserImp.class.php';
require_once '../class/Modele/ProduitImp.class.php';


$db = creer();
remplirBaseTest($db);

try{
	

$userTest = new UserImp($db, 'Toto', 'Foo', 'toto1');

print_r($userTest->getOrders());

echo '<br /><br />';
print_r($userTest->getLastOrder());

$userTest->getBasket()->addProduct(new ProduitImp($db, 10));

echo '<br /><br />';
print_r($userTest->getBasket());




}
catch (Exception $e) {
	$e->getTrace();
}