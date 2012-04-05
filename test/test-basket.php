<?php
use modele\DBFactorySqlite;
use modele\PanierImp;
use modele\CalendrierImp;
use modele\ProduitImp;


require_once 'creationBaseTest.php';
require_once '../class/Modele/PanierImp.class.php';
require_once '../class/Modele/CalendrierImp.class.php';
require_once '../class/Modele/ProduitImp.class.php';
require_once '../class/Modele/DBFactorySqlite.class.php';


$db = creer();
remplirBaseTest($db);
// /!\ ATTENTION : ce test nécessite d'avoir un calendrier valide, un produit valide
// 

$dbFac = new DBFactorySqlite($db);
$panierTest = new PanierImp($dbFac, new CalendrierImp($dbFac));

$produit = new ProduitImp($dbFac, 11);

echo '<pre>';
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

$panierTest->addProduct($produit);
$panierTest->validateOrder('Lorem', 'Ipsum', 'latin');

//vérification de l'état de la base de donnée
echo 'etat de la base : <br />';
$req = $db->query('SELECT * FROM orders');
echo '<br /><br />';
print_r($req->fetchAll());

$req = $db->query('SELECT * FROM ordered_products');
echo '<br /><br />';
print_r($req->fetchAll());

//test pour mettre une date non valide
$panierTest->setDate('2012-02-02');
$panierTest->addProduct($produit);
$panierTest->validateOrder('Titi', 'Fii', 'fifi10');

//vérification de l'état de la base de donnée
$req = $db->query('SELECT * FROM orders');
echo '<br /><br />';
print_r($req->fetchAll());
echo '</pre>';

