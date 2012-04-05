<?php

use modele\DBFactorySqlite;

require_once 'creationBaseTest.php';
require_once '../class/Modele/CommandeImp.class.php';
require_once '../class/Modele/DBFactorySqlite.class.php';

use modele\CommandeImp;

$db = creer();
remplirBaseTest($db);

$commandeTest = new CommandeImp(new DBFactorySqlite($db), 1);//première commande créée

echo 'date de la commande :',$commandeTest->getDate(),'<br />';
echo '<pre>';
echo 'produits de la commande :';
print_r($commandeTest->getProducts());
echo '</pre>';