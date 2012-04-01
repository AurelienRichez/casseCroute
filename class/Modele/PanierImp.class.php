<?php

namespace modele;
use PDO;	

	require_once 'Panier.class.php';
	require_once 'Constants.php';
	include_once('Produit.class.php');


	class PanierImp implements Panier{
		
		private $dbFactory;
		private $produits;
		private $date;
		private $calendrier;
		private $db;
		
		
		
		function __construct(DBFactory $dbFac, Calendrier $cal) {
			$this->dbFactory = $dbFac;
			$this->db = $dbFac->getDataBase();
			$this->calendrier = $cal;
			$this->date = $this->calendrier->nextValidDay();
			$this->produits = array();
		}

		public function getProducts() {
			return $this->produits;
		}
		
		public function getNumberOfProducts(){
			return count($this->produits);
		}
		
		public function setDate($date) {
			if($this->calendrier->validDay($date))
				$this->date = $date;
		}

		public function getDate() {
			return $this->date;
		}
	
		public function addProduct(Produit $p, $nb = 1){
			if(isset($this->produits[$p->getID()]))
				$this->produits[$p->getID()]['nb']=$this->produits[$p->getID()]['nb']+$nb;
			else {
				$this->produits[$p->getID()]['prod']=$p;
				$this->produits[$p->getID()]['nb']=$nb;
			}
		}

		public function validateOrder($name, $surname, $id_user) {
			//Vérification pour éviter d'ajouter une commande vide dans la base
			if (count($this->produits)==0)
				throw new Exception('Le panier est vide !');
				
			$req = $this->db->exec('INSERT INTO '.NAME_DB_COMMANDE.'(id_user,name_user, surname_user,day) VALUES("'.$id_user.'","'.$name.'","'.$surname.'","'.$this->date.'")')or print_r($this->db->errorInfo());
			$id = $this->db->lastInsertId();
			foreach($this->produits as $p) {
				$this->db->exec('INSERT INTO '.NAME_DB_PROD_COMM.'(id_order,id_product,nb_product) VALUES('.$id.','.$p['prod']->getId().','.$p['nb'].')');
			}
			//vidage du panier
			$this->produits = array();
			$this->date = $this->calendrier->nextValidDay();
		}

		public function deleteProduct(Produit $p, $nb=1){
			if(isset($this->produits[$p->getID()])){
				$this->produits[$p->getID()]['nb']=$this->produits[$p->getID()]['nb']-$nb;
				if($this->produits[$p->getID()]['nb']<=0)
					unset($this->produits[$p->getID()]);
			}
				
		}

		private function checkDateFormat($date){

			$valeurs = explode('-',$date);

			if(!(count($valeurs)==3 && checkdate($valeurs[1], $valeurs[2], $valeurs[0]))){
				throw new Exception('La date entrée n\'est pas valide : '.$date);
			}
		}

		public function deleteAll() {
			$this->produits = array();
		}
		
		public function __sleep() {
			return array('dbFactory','produits','date','calendrier');
		}
		
		public function __wakeup() {
			$this->db = $this->dbFactory->getDataBase();
		}
		
	}

