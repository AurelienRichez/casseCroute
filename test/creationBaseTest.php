<?php


/**
 * crée une base de donnée sqlite pour les tests et la retourne
 * attention les requpetes utilisées ici peuvent être légèrement différente 
 * selon la syntaxe sqlite ou mysql
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
	)');
	$db->query('INSERT INTO `articles` (`code`, `libelleTicket`, `tva`, `prix`) VALUES
(10, "cafe", 7, 2);');
	
	
	$db->query("CREATE TABLE calendar (
	day DATE,
	PRIMARY KEY(day)
)");

$db->query("CREATE TABLE orders (
	id_order INTEGER PRIMARY KEY,
	id_user CHAR(30),
	name_user CHAR(30),
	surname_user CHAR(30),
	day date,
	FOREIGN KEY(day)
		REFERENCES calendar(day)
		ON DELETE RESTRICT
)") or die(print_r($db->errorInfo()));

$db->query("CREATE TABLE ordered_products(
	id_order INT,
	id_product decimal(10,0),
	nb_product INT,
	PRIMARY KEY(id_order,id_product),
	FOREIGN KEY(id_order)
		REFERENCES orders(id_order)
		ON DELETE CASCADE,
	FOREIGN KEY(id_product)
		REFERENCES articles(code)
		ON DELETE CASCADE
)")or die(print_r($db->errorInfo()));
	

	
	return $db;
}


function remplirBaseTest($db) {
	$db->exec("INSERT INTO calendar VALUES('2012-05-03')") or die(print_r($db->errorInfo()));
	$db->exec('INSERT INTO orders(id_user,surname_user,name_user,day) VALUES("toto","Foo","Toto","2012-05-03")') or die(print_r($db->errorInfo()));
	$id = $db->lastInsertId();
	$db->exec('INSERT INTO ordered_products(id_order,id_product,nb_product) VALUES('.$id.',10,2)') or die(print_r($db->errorInfo()));
}