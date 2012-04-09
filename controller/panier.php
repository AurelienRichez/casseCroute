<?php
/*
* panier.php
* created 5 avr. 2012
*/

//TODO à faire
//TODO rajouter la gestion des suppressions de sandwiches
include 'view/vueBase.php';
include 'view/panier.php';

writeHead($_SESSION['user']);
writeContent($_SESSION['user']);
writeFoot($_SESSION['user']);