<?php
/*
* ProductCreator.class.php
* created 18 avr. 2012
*/
require_once '../class/Modele/Constants.php';

class AdminProductCreator {
	//TODO à tester
	
	/**
	 * Crée un produit.
	 * @param PDO $db
	 * @param unknown_type $id
	 * @param unknown_type $name
	 * @param unknown_type $description
	 * @param unknown_type $avalaible
	 * @param unknown_type $image
	 */
	public static function createProduct(PDO $db, $id, $name, $description, $avalaible, $image = NULL) {
		$req = $db->prepare('INSERT INTO '.NAME_DB_SELLABLE_PROD.'(id_product, name, description, available) VALUES(:id,:name,:desc,:avalaible');
		$req->execute(array('id'=>$id,'name'=>$name,'desc'=>$desc,'available'=>$available));
	} 
	
	/**
	 * édite le produit ayant l'id passé en paramètre.
	 * @param PDO $db
	 * @param unknown_type $id
	 * @param unknown_type $name
	 * @param unknown_type $description
	 */
	public static function editProduct(PDO $db, $id, $name, $description) {
		$req = $db->prepare('UPDATE '.NAME_DB_SELLABLE_PROD.' SET name=:name, description=:desc WHERE id_product=:id');
		$req->execute(array('name'=>$name,'desc'=>$description,'id'=>$id));
	}

	public static function getAllProducts() {
		
	}
}