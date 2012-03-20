<?php

namespace modele;
	
	require_once 'Panier.class.php';
	require_once 'Constants.php';
	include_once('Produit.class.php');


	class PanierImp implements Panier{//TODO classe à tester
		
		
		private $produits;
		private $date;
		private $calendrier;
		private $db;
		
		
		
		function __construct(PDO $db, Calendrier $cal) {
			$this->db = $db;
			$this->calendrier = $cal;
			$this->date = $this->calendrier->nextValidDay();
			$this->produits = array();
		}
		
		/**
		* retourne un tableau de produits
		*/		
		public function getProducts() {
			return $this->produits;
		}
		
		/**
		* Retourne le nombre de produit dans le panier
		*/		

		public function getNumberOfProducts(){
			return count($this->produits);
		}

		/**
		* Ajoute un produit
		*/		
		public function addProduct(Produit $p, $nb = 1){
			if(isset($this->produits[$p->getID()]))
				$this->produits[$p->getID()]['nb']=$this->produits[$p->getID()]['nb']+$nb;
			else {
				$this->produits[$p->getID()]['prod']=$p;
				$this->produits[$p->getID()]['nb']=$nb;
			}
		}

		/**
		* Valide la commande et vide le panier
		*/
		public function validateOrder($name, $surname, $id_user) {
			$req = $this->db->exec('INSERT INTO '.NAME_DB_COMMANDE.'(id_user,name_user, surname_user,day) VALUES('.$id_user.','.$name.','.$surname.',"'.$this->date.'")');
		
			//TODO fonction à finir
		}
		
		/**
		* supprime un produit
		*/		
		public function deleteProduct(Produit $p);
		
		private function checkDateFormat($date){
			if(!preg_match("#[0-9]{4}-[0-9]{2}-[0-9]{2}#", $date)){
				throw new Exception('La date entrée n\'est pas valide');
			}
		}
		
		/**
		 * vide le panier
		 */
		public function deleteAll() {
			$this->produits = array();
		}
	}

