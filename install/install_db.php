<?php
//fichier instalant la base de donnée
try {
	$db = new PDO('mysql:host=localhost;dbname=test-casse-croute', 'root', '');
}
catch(PDOException $e) {
	echo $e->getMessage();
}
	
	$req = file_get_contents('install_db.sql'); 
	$db->query($req)or die(print_r($db->errorInfo()));