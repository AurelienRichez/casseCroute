<?php
/*
* test-dbFacMysql.php
* created 7 avr. 2012
*/



require_once '../class/modele/DBFactoryMysql.class.php';

$dbFac = new DBFactoryMysql('localhost', 'test-casse-croute', 'root', '');

$db = $dbFac->getDataBase();

var_dump($db);

//$db = new PDO('mysql:host=localhost;dbname=test-casse-croute', 'root', '');