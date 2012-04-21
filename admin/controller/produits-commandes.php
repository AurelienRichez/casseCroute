<?php


require_once 'view/produits-commandes.php';
require_once 'view/vueBase.php';

if(isset($_GET['date_products'])) {
	$dateUS = CalendrierImp::invDate($_GET['date_products']);
	$agenda = new CalendrierImp(DBFactoryMysql::getDBFactory());
	if($agenda->validDay($dateUS)) {
		$products = AdminOrderManipulator::getProductsForDay(DBFactoryMysql::getDBFactory()->getDataBase(), $dateUS);
		writeHead();
		writeProducts($products, $_GET['date_products']);
		writeFoot();
	}
	else {
		writeHead();
		writeNonValidDay($_GET['date_products']);
		writeFoot();
	}
}
else {
	header('location:admin-accueil.html');
}