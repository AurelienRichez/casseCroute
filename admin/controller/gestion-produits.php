<?php
//TODO à faire
//TODO gérer les activation et désactivations

require_once 'view/vueBase.php';
require_once 'view/gestion-produits.php';


if(isset($_POST['id'])) {
	if(isset($_POST['activate'])) {
		AdminProductManipulator::activateProduct($_POST['id'], DBFactoryMysql::getDBFactory()->getDataBase());
	}
	else if(isset($_POST['desactivate'])) {
		AdminProductManipulator::desactivateProduct($_POST['id'], DBFactoryMysql::getDBFactory()->getDataBase());
	}
}
//TODO afficher l'info si le produit a été activé ou désactivé
writeHead();
writeProducts(AdminProductManipulator::getAllSellableProducts(DBFactoryMysql::getDBFactory()->getDataBase()));
writeFoot();