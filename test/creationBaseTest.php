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
(10, "cafe", 7, 2);') or die(print_r($db->errorInfo()));
	$db->query('INSERT INTO `articles` (`code`, `libelleTicket`, `tva`, `prix`) VALUES
			(11, "sandwich", 7, 2);') or die(print_r($db->errorInfo()));
	
	
	$db->query("CREATE TABLE calendar (
	day DATE,
	PRIMARY KEY(day)
)") or die(print_r($db->errorInfo()));

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

$db->query("CREATE TABLE sellable_item(
	id_product INT,
	name CHAR(30),
	description TEXT,
	PRIMARY KEY(id_product)
)") or die(print_r($db->errorInfo()));

$db->query("CREATE TABLE ordered_products(
	id_order INT,
	id_product INT,
	nb_product INT,
	PRIMARY KEY(id_order,id_product),
	FOREIGN KEY(id_order)
		REFERENCES orders(id_order)
		ON DELETE CASCADE,
	FOREIGN KEY(id_product)
		REFERENCES sellable_item(id_product)
		ON DELETE CASCADE
)")or die(print_r($db->errorInfo()));
	

$db->query("INSERT INTO sellable_item(id_product,name,description) VALUES(11,'sandwich au jambon', 'Un superbe sandwich au jambon')")or die(print_r($db->errorInfo()));
	
	return $db;
}

creer();

function remplirBaseTest($db) {
	//ajout d'anciennes commandes
	$db->exec("INSERT INTO calendar VALUES('2011-12-15')") or die(print_r($db->errorInfo()));
	$db->exec('INSERT INTO orders(id_user,surname_user,name_user,day) VALUES("toto1","Foo","Toto","2011-12-15")') or die(print_r($db->errorInfo()));
	$id = $db->lastInsertId();
	$db->exec('INSERT INTO ordered_products(id_order,id_product,nb_product) VALUES('.$id.',11,3)') or die(print_r($db->errorInfo()));
	$db->exec("INSERT INTO calendar VALUES('2012-01-03')") or die(print_r($db->errorInfo()));
	$db->exec('INSERT INTO orders(id_user,surname_user,name_user,day) VALUES("toto1","Foo","Toto","2012-01-04")') or die(print_r($db->errorInfo()));
	$id = $db->lastInsertId();
	$db->exec('INSERT INTO ordered_products(id_order,id_product,nb_product) VALUES('.$id.',11,2)') or die(print_r($db->errorInfo()));
	
	
	
	// ATTENTION : cette date est valide à l'heure ou j'écris ces lignes, il faudra la mettre plus tard si des tests sont fait après
	$db->exec("INSERT INTO calendar VALUES('2012-05-03')") or die(print_r($db->errorInfo()));
	$db->exec('INSERT INTO orders(id_user,surname_user,name_user,day) VALUES("toto1","Foo","Toto","2012-05-03")') or die(print_r($db->errorInfo()));
	$id = $db->lastInsertId();
	$db->exec('INSERT INTO ordered_products(id_order,id_product,nb_product) VALUES('.$id.',11,2)') or die(print_r($db->errorInfo()));
	
	$db->exec("INSERT INTO calendar VALUES('2012-07-04')") or die(print_r($db->errorInfo()));
	$db->exec('INSERT INTO orders(id_user,surname_user,name_user,day) VALUES("toto1","Foo","Toto","2012-07-04")') or die(print_r($db->errorInfo()));
	$id = $db->lastInsertId();
	$db->exec('INSERT INTO ordered_products(id_order,id_product,nb_product) VALUES('.$id.',11,1)') or die(print_r($db->errorInfo()));
}

