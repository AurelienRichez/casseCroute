<?php
/*
* ProductCreator.class.php
* created 18 avr. 2012
*/
require_once '../client/class/Modele/Constants.php';

class AdminProductManipulator {
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

	/**
	 * Retourne un tableau de produits contenant tous les produits vendables, y compris
	 * ceux qui ne sont pas disponibles.
	 * @param PDO $db
	 * @return multitype:ProduitImp 
	 */
	public static function getAllSellableProducts(PDO $db) {
		$req = $db->query('SELECT * FROM '.NAME_DB_SELLABLE_PROD.' ORDER BY available');
		$result = $req->fetchAll();
		$aRetourner = array();
		for($i=0;$i<count($result);$i++) {
			$aRetourner[$i] = new ProduitImp(DBFactoryMysql::getDBFactory(), $result[$i]['id_product']);
		}
		return $aRetourner;
	}
	
	
	/**
	 * Retourne la liste de tous les produits de la base du SIC.
	 * @param PDO $db
	 * @return multitype:
	 */
	public static function getAllArticles(PDO $db) {
		$req = $db->query('SELECT * FROM '.NAME_DB_PRODUIT);
		return $req->fetchAll();
	}
	
	/**
	 * Active un produit pour la vente
	 * @param unknown_type $id
	 * @param PDO $db
	 */
	public static function activateProduct($id,PDO $db) {
		$req = $db->prepare('UPDATE '.NAME_DB_SELLABLE_PROD.' SET available=1 WHERE id_product=:id');
		$req->execute(array('id'=>$id));
	}
	
	/**
	 * D2sactive un produit pour la vente.
	 * @param unknown_type $id
	 * @param PDO $db
	 */
	public static function desactivateProduct($id,PDO $db) {
		$req = $db->prepare('UPDATE '.NAME_DB_SELLABLE_PROD.' SET available=0 WHERE id_product=:id');
		$req->execute(array('id'=>$id));
	}
	
}