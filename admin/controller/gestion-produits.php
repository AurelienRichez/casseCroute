<?php
//TODO à faire
//TODO gérer les activation et désactivations

require_once 'view/vueBase.php';
require_once 'view/gestion-produits.php';



writeHead();
writeProducts(AdminProductManipulator::getAllSellableProducts(DBFactoryMysql::getDBFactory()->getDataBase()));
writeFoot();