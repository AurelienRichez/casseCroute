<?php

use modele\DBFactorySqlite;

require_once 'creationBaseTest.php';
require_once '../class/Modele/CommandeImp.class.php';
require_once '../class/Modele/DBFactorySqlite.class.php';

use modele\CommandeImp;

$db = creer();
remplirBaseTest($db);

$commandeTest = new CommandeImp(new DBFactorySqlite($db), 1);//première commande créée

echo $commandeTest->getDate(),'<br />';
print_r($commandeTest->getProducts());