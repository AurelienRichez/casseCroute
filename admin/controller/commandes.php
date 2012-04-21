<?php
//TODO à faire

require_once 'view/commandes.php';
require_once 'view/vueBase.php';

if(isset($_GET['date_order'])) {
	$dateUS = CalendrierImp::invDate($_GET['date_order']);
	$agenda = new CalendrierImp(DBFactoryMysql::getDBFactory());
	if($agenda->validDay($dateUS)) {
		$orders = AdminOrderManipulator::getOrdersForDay(DBFactoryMysql::getDBFactory()->getDataBase(), $dateUS);
		writeHead();
		writeOrders($orders, $_GET['date_order']);
		writeFoot();
	}
	else {
		writeHead();
		writeNonValidDay($_GET['date_order']);
		writeFoot();
	}
}
else {
	header('location:admin-accueil.html');
}