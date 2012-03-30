<?php

require_once 'creationBaseTest.php';
require_once '../class/Modele/CommandeImp.class.php';

use modele\CommandeImp;

$db = creer();
remplirBaseTest($db);

$commandeTest = new CommandeImp($db, 1);//première commande créée

echo $commandeTest->getDate(),'<br />';
print_r($commandeTest->getProducts());