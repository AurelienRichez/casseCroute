<?php
namespace modele;
require_once 'Commande.class.php';

use PDO;

//TODO tester le calendrier

class CommandeImp implements Commande{

	private $db;
	const NAME_DB = 'commande';


	public function __construct(PDO $db){
		$this->db = $db;
	}

	public function getDate(){
		$result = $this->db->query('SELECT date FROM '.self::NAME_DB.' WHERE id_commande='.$id_commande);
	}

	public function getProducts(){
		$result = $this->db->query('SELECT * FROM commande WHERE id_commande='.id_commande);
	}

}