<?php
//TODO à faire

require_once 'view/vueBase.php';
require_once 'view/ajout-produit.php';

if(isset($_POST['article']) && isset($_POST['name']) && isset($_POST['description'])) {
	AdminProductManipulator::createProduct(DBFactoryMysql::getDBFactory()->getDataBase(), $_POST['article'], $_POST['name'], $_POST['description']);
	define('ADDED_PRODUCT','');
}

writeHead();
if(defined('ADDED_PRODUCT')) {
	writeProductAdded($_POST['name']);
}
writeForm(AdminProductManipulator::getAllArticles(DBFactoryMysql::getDBFactory()->getDataBase()));
writeFoot();