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

$panierTest->addProduct($produit);
$panierTest->addProduct($produit);
$panierTest->addProduct($produit,2);

$panierTest->validateOrder('Aurélien', 'Richez', 'ariche10');