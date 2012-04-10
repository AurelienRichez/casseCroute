<?php
/*
* test_session.php
* created 1 avr. 2012
*/



require_once 'creationBaseTest.php';
require_once '../class/Modele/UserImp.class.php';
require_once '../class/Modele/DBFactorySqlite.class.php';

session_start();
try {
	
	$db = creer();
	remplirBaseTest($db);
	$dbFac = new DBFactorySqlite($db);
	$testUser = new UserImp($dbFac, 'Toto', 'Foo', 'toto1');
}
catch(Exception $e){
	echo $e->getMessage();
	echo'<pre>';print_r($e->getTrace());echo '</pre>';
}
$_SESSION['user'] = $testUser;