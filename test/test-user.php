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

echo '<pre>';
print_r($userTest->getOrders());
echo '</pre>';

echo '<br /><br />';
echo '<pre>';
print_r($userTest->getLastOrder());
echo '</pre>';

$userTest->getBasket()->addProduct(new ProduitImp($db, 10));

echo '<br /><br />';
echo '<pre>';
print_r($userTest->getBasket());
echo '</pre>';



}
catch (Exception $e) {
	$e->getTrace();
}