<?php



require_once 'creationBaseTest.php';
require_once '../class/Modele/ProduitImp.class.php';
require_once '../class/Modele/DBFactorySqlite.class.php';


$db = creer();
remplirBaseTest($db);

$produitTest = new ProduitImp(new DBFactorySqlite($db), 11);//11 est l'id du produit ajouté par défaut au début

echo 'nom : ',$produitTest->getName(),'<br />';
echo 'id : ',$produitTest->getID(),'<br />';
echo 'prix : ',$produitTest->getPrice(),'<br />';
echo 'description : ',$produitTest->getDescription(),'<br />';

//TODO ajouter plus tard les tests d'image quand ce sera implémenté