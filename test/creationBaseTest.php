<?php


/**
 * crée une base de donnée sqlite pour les tests et la retourne
 */
function creer() {
	try {
		$db = new PDO('sqlite::memory:');
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
	
	
	$db->query('CREATE TABLE IF NOT EXISTS `articles` (
  `code` decimal(10,0) NOT NULL,
  `libelleTicket` varchar(255) NOT NULL,
  `tva` decimal(10,0) NOT NULL,
  `prix` decimal(10,0) NOT NULL,
  PRIMARY KEY  (`code`)
	);
			INSERT INTO `articles` (`code`, `libelleTicket`, `tva`, `prix`) VALUES
(10, "cafe", 7, 2);');
	
	
	$req = file_get_contents('../install/install_db.sql');
	$db->query($req)or die(print_r($db->errorInfo()));
	
	//TODO remplir la base
	
	
	return $db;
}