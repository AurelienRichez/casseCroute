<?php
/*
* commandes.php
* created 5 avr. 2012
*/


include 'view/vueBase.php';
include 'view/commandes.php';


writeHead($_SESSION['user']);
writeContent($_SESSION['user']);
writeFoot($_SESSION['user']);