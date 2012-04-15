<?php
//fichier instalant la base de donnée

try {//TODO fichier à modifier par la suite
	$db = new PDO('mysql:host=localhost;dbname=test-casse-croute', 'root', '');
}
catch(PDOException $e) {
	echo $e->getMessage();
}
	
	$req = file_get_contents('install_db.sql'); 
	$db->query($req)or die(print_r($db->errorInfo()));
	
//*[TEST]
	$db->query("INSERT INTO sellable_item(id_product,name,description) VALUES(11,'sandwich au jambon', 'Un superbe sandwich au jambon')")or die(print_r($db->errorInfo()));
	
	//ajout d'anciennes commandes
	$db->exec("INSERT INTO calendar VALUES('2011-12-15')") or die(print_r($db->errorInfo()));
	$db->exec('INSERT INTO orders(id_user,surname_user,name_user,day) VALUES("toto1","Foo","Toto","2011-12-15")') or die(print_r($db->errorInfo()));
	$id = $db->lastInsertId();
	$db->exec('INSERT INTO ordered_products(id_order,id_product,nb_product) VALUES('.$id.',11,3)') or die(print_r($db->errorInfo()));
	$db->exec("INSERT INTO calendar VALUES('2012-01-04')") or die(print_r($db->errorInfo()));
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
//[/TEST]*/
