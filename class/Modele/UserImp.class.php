<?php

namespace modele;

require_once 'User.class.php';
require_once 'PanierImp.class.php';
require_once 'CalendrierImp.class.php';
require_once 'CommandeImp.class.php';
require_once 'Constants.php';

use \PDO;

class UserImp implements User {

	private $dbFactory;
	private $db;

	private $id_user;
	private $name;
	private $surname;

	private $basket;
	private $calendar;
	private $lastOrder = NULL;
	private $orders = NULL;

	function __construct(DBFactory $dbFac,$name,$surname,$id_user) {
		$this->dbFactory = $dbFac;
		$this->db= $dbFac->getDataBase();
			
		$this->id_user = $id_user;
		$this->name = $name;
		$this->surname = $surname;
			
		$this->calendar = new CalendrierImp($dbFac);
		$this->basket = new PanierImp($dbFac, $this->calendar);
	}
	
	public function getName() {
		return $this->name;
	}
	
	public function getSurname() {
		return $this->surname;
	}
	
	public function getId() {
		return $this->id_user;
	}

	public function getOrders(){
		//La fonction récupère les commande une première fois et n'est plus mise
		//à jour après.
		//informations au besoin (à appeler après l'ajout ou la suppression d'une commande)
		if($this->orders == NULL){
			$this->orders=array();

			$req = $this->db->prepare('SELECT id_order FROM '.NAME_DB_COMMANDE.' WHERE id_user=? AND day>="'.$this->calendar->nextValidDay().'"');
			$req->execute(array($this->id_user));
			$result = $req->fetchAll();

			for($i=0;$i<count($result);$i++) {
				$this->orders[$i] = new CommandeImp($this->dbFactory, $result[$i]['id_order']);
			}
		}
			
		return $this->orders;
	}

	public function getLastOrder(){
		if($this->lastOrder == NULL) {
			$req = $this->db->prepare('SELECT id_order FROM '.NAME_DB_COMMANDE.' WHERE id_user=? ORDER BY id_order DESC LIMIT 0,1');
			$req->execute(array($this->id_user));
			$result = $req->fetchAll();
			if(count($result)>=1)
				$this->lastOrder = new CommandeImp($this->dbFactory, $result[0]['id_order']);
		}
			
		return $this->lastOrder;
	}

	public function getBasket(){
		return $this->basket;
	}
	
	public function getCalendar() {
		return $this->calendar;
	}

	public function validateOrder(){
		$this->basket->validateOrder();
		$this->orders=NULL;
		$this->lastOrder=NULL;
	}
	
	public function deleteOrder($id_order) {
		$req = $this->db->prepare('DELETE FROM orders WHERE id_order=? AND id_user="'.$this->id_user.'" AND day>=CURDATE()') or die(print_r($this->db->errorInfo()));
		$req->execute(array($id_order));
		$this->orders=NULL;
		$this->lastOrder=NULL;
	}
	
	public function __sleep() {
		return array('dbFactory','id_user','name','surname','basket','calendar','lastOrder','orders');
	}
	
	public function __wakeup() {
		$this->db = $this->dbFactory->getDataBase();
	}
}

