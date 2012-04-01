<?php



use modele\DBFactorySqlite;
use modele\Produit;
use modele\ProduitImp;

require_once 'creationBaseTest.php';
require_once '../class/Modele/ProduitImp.class.php';
require_once '../class/Modele/DBFactorySqlite.class.php';


$db = creer();
remplirBaseTest($db);

$produitTest = new ProduitImp(new DBFactorySqlite($db), 10);//10 est l'id du produit ajouté par défaut au début

echo 'nom : ',$produitTest->getName(),'<br />';
echo 'id : ',$produitTest->getID(),'<br />';
echo 'prix : ',$produitTest->getPrice(),'<br />';

//TODO ajouter plus tard les tests d'image etc quand ce sera implémenté