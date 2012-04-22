<?php

require_once 'view/vueBase.php';
require_once 'view/edition-produit.php';

if(isset($_POST['id_edition']) && isset($_POST['name']) && isset($_POST['description'])) {
	echo 'bidule';
	AdminProductManipulator::editProduct(DBFactoryMysql::getDBFactory()->getDataBase(), $_POST['id_edition'], $_POST['name'], $_POST['description']);
}
if(!isset($_POST['id'])) {
	header('location:admin-gestion-produits.html');
	exit;
}


writeHead();
writeForm(new ProduitImp(DBFactoryMysql::getDBFactory(),$_POST['id']));
writeFoot();