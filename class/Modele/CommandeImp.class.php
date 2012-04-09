<?php
namespace modele;
require_once 'Commande.class.php';
require_once 'Constants.php';
require_once 'ProduitImp.class.php';

use PDO;
use Exception;



class CommandeImp implements Commande{

	private $db;
	private $dbFactory;
	private $id;
	const NAME_DB = 'orders';


	public function __construct(DBFactory $dbFac,$id){
		$this->dbFactory = $dbFac;
		$this->db = $dbFac->getDataBase();
		if(is_numeric($id)) {
			$this->id = $id;
		}
		else{
			throw new Exception('id de commande non valide, l\'id doit être un nombre');
		}
	}

	public function getDate() {
		$result = $this->db->query('SELECT day FROM '.NAME_DB_COMMANDE.' WHERE id_order='.$this->id);
		$tableResult = $result->fetchAll();

		if(count($tableResult)==0) {
			throw new Exception('cette commande n\'existe pas');
		}

		return $tableResult[0]['day'];

	}
	
	public function getId() {
		return $this->id;
	}

	public function getProducts() {
		$result = $this->db->query('SELECT * FROM '.NAME_DB_COMMANDE.' WHERE id_order='.$this->id);
		$req = $this->db->query('SELECT id_product,nb_product FROM '.NAME_DB_PROD_COMM.' WHERE id_order='.$this->id);
		$result = $req->fetchAll();
		$aRetourner = array();

		for ($i=0;$i<count($result);$i++) {
			$aRetourner[$i]['prod']=new ProduitImp($this->dbFactory,$result[$i]['id_product']);
			$aRetourner[$i]['nb']=$result[$i]['nb_product'];
		}

		return $aRetourner;
	}
	
	//TODO implémenter les fonction restante
	
	public function getNameUser() {//TODO
		$req = $this->db->query('SELECT name_user FROM orders WHERE id_order=');
	}
		
			
	public function getSurnameUser(){
		//TODO à faire
	}
		
		
	public function getIdUser(){ 
		//TODO à faire
	}
	
	public function __sleep() {
		return array('dbFactory','id');
	}

	public function __wakeup() {
		$this->db = $this->dbFactory->getDatabase();
	}

}