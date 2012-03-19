<?php
namespace modele;
require_once 'Commande.class.php';

use PDO;
use Exception;



class CommandeImp implements Commande{

	private $db;
	private $id;
	const NAME_DB = 'orders';


	public function __construct(PDO $db, $id){
		$this->db = $db;
	}

	public function getDate() {
		$result = $this->db->query('SELECT day FROM '.self::NAME_DB.' WHERE id_order='.$id_commande);
		$tableResult = $result->fetchAll();
		
		if(count($tableResult)==0) {
			throw new Exception('cette commande n\'existe pas');
		}
		
		return $tableResult[0]['day'];
		
	}

	public function getProducts() {
		$result = $this->db->query('SELECT * FROM '.self::NAME_DB.' WHERE id_order='.id_commande);
		$req = $this->db->query('SELECT id_product,nb_product FROM '.NAME_DB_PROD_COMM.' WHERE id_order='.$id);
		$result = $req->fetchAll();
		$aRetourner = array();
		
		for ($i=0;$i<count($result);$i++) {
			$aRetourner[$i]['id']=$result[$i]['id_product'];
			$aRetourner[$i]['nb']=$result[$i]['nb_product'];
		}
		
		return $aRetourner;
	}

}