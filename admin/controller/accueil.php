<?php


include_once 'view/accueil.php';
include_once 'view/vueBase.php';

writeHead();
writeContent(new CalendrierImp(DBFactoryMysql::getDBFactory()));
writeFoot();