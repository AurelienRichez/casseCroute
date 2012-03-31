<?php
require_once 'creationBaseTest.php';
require_once '../class/Modele/UserImp.class.php';

use modele\UserImp;

$db = creer();
remplirBaseTest($db);

try{
	

$userTest = new UserImp($db, 'Toto', 'Foo', 'toto1');

print_r($userTest->getOrders());





}
catch (Exception $e) {
	$e->getTrace();
}