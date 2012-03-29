<?php
namespace modele;
use PDO;


require_once 'Produit.class.php';
require_once 'Constants.php';



class ProduitImp implements Produit{
	
	private $db;
	private $id;
	private $name;
	private $price;
	
	function __construct(PDO $db, $id){
		$this->db = $db;
		if(!preg_match('#[0-9]+#', $id)) {
			throw new Exception('mauvais identifiant de produit : '.$id);
		}
		$this->id=$id;
		$req = $db->query('SELECT * FROM '.NAME_DB_PRODUIT.' WHERE code='.$id);
		$result = $req->fetchAll();
		$this->name = $result[0]['libelleTicket'];
		$this->price = $result[0]['prix']*(1+$result[0]['tva']/100);
	}

	/**
	 *retourne le nom du produit
	 */
	public function getName(){
		return $this->name;
	}

	/**
	 * retourne l'id du produit
	 */
	public function getID(){
		return $this->id;
	}

	/**
	 * retourne le prix du produit
	 */
	public function getPrice() {
		return $this->price;
	}

	/**
	 *retourne l'adresse absolue de l'image du produit
	 */
	public function getImage(){
		return NULL; //TODO non implémenté pour le moment
	}

	/**
	 * retourne la description du produit
	 */
	public function getDescription() {
		return NULL; //TODO non implémenté pour le moment
	}

	/**
	 * egalite
	 */
	public function equals(Produit $p) {
		return $this->id = $p->getID();
	}

}
