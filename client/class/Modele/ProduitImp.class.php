<?php


require_once 'Produit.class.php';
require_once 'Constants.php';



class ProduitImp implements Produit{
	
	private $dbFactory;
	private $db;
	private $id;
	private $name;
	private $price;
	
	function __construct(DBFactory $dbFAc, $id){
		$this->dbFactory = $dbFAc;
		$this->db = $dbFAc->getDataBase();
		if(!preg_match('#[0-9]+#', $id)) {
			throw new Exception('mauvais identifiant de produit : '.$id);
		}
		$this->id=$id;
		$req = $this->db->query('SELECT * FROM '.NAME_DB_SELLABLE_PROD.' AS sp INNER JOIN '.NAME_DB_PRODUIT.' AS p ON sp.id_product = p.code WHERE sp.id_product='.$id);
		$result = $req->fetchAll();
		if(count($result) == 1) {
			$this->name = $result[0]['name'];
			$this->price = $result[0]['prix']*(1+$result[0]['tva']/100);
		}
		else {
			throw new Exception('erreur : Mauvais id de produit');
		}
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
		$req = $this->db->query('SELECT description FROM '.NAME_DB_SELLABLE_PROD.' WHERE id_product='.$this->id);
		$result = $req->fetch();
		return $result['description'];
	}

	/**
	 * egalite
	 */
	public function equals(Produit $p) {
		return $this->id = $p->getID();
	}
	
	
	/**
	 * @return boolean true si le produit est disponible, false sinon.
	 */
	public function isAvailable() {
		$req = $this->db->query('SELECT available FROM '.NAME_DB_SELLABLE_PROD.' WHERE id_product='.$this->id);
		$result = $req->fetch();
		return $result['available'] == 1;
	}
	
	/**
	 * retourne tous les produits vendables
	 */
	public static function getAllProducts(DBFactory $dbFac) {
		$db = $dbFac->getDataBase();
		$req = $db->query('SELECT * FROM sellable_item WHERE available=1');
		$result = $req->fetchAll();
		$aRetourner = array();
		for($i=0;$i<count($result);$i++) {
			$aRetourner[$i] = new ProduitImp($dbFac, $result[$i]['id_product']);
		}
		return $aRetourner;
	}
	
	public function __sleep() {
		return array('dbFactory','id','name','price');
	}
	
	public function __wakeup() {
		$this->db = $this->dbFactory->getDataBase();
	}
	
}
