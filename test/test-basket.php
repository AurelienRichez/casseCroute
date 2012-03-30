<?php
require_once 'creationBaseTest.php';
require_once '../class/Modele/PanierImp.class.php';
require_once '../class/Modele/CalendrierImp.class.php';
require_once '../class/Modele/ProduitImp.class.php';

use modele\PanierImp;
use modele\CalendrierImp;
use modele\ProduitImp;

$db = creer();
remplirBaseTest($db);
// /!\ ATTENTION : ce test nécessite d'avoir un calendrier valide, un produit valide
// 

$panierTest = new PanierImp($db, new CalendrierImp($db));

$produit = new ProduitImp($db, 10);

//vérification de la date
echo 'date',$panierTest->getDate();

echo '<br /><br />';
//test ajout de produit
$panierTest->addProduct($produit);
$panierTest->addProduct($produit);
$panierTest->addProduct($produit,2);

echo 'après ajout de plusieurs produits : ';
print_r($panierTest->getProducts());

echo '<br /><br />';
//test retrait de produit
echo 'après retrait de plusieurs produits : ';
$panierTest->deleteProduct($produit,2);
print_r($panierTest->getProducts());

echo '<br /><br />';
//test retrait de tous les produits
echo 'après retrait de 3 produits : ';
$panierTest->deleteProduct($produit,3);
print_r($panierTest->getProducts());

$panierTest->addProduct($produit);
$panierTest->addProduct($produit);
$panierTest->addProduct($produit,2);
echo '<br /><br />';
echo 'après retrait avec deleteAll : ';
$panierTest->deleteAll();
print_r($panierTest->getProducts());


$panierTest->validateOrder('Aurélien', 'Richez', 'ariche10');

//TODO vérifier l'état de la base de donnée
//TODO déclencher des erreurs de mauvaise date
