<?php

namespace modele;
	
	include_once('Produit.class.php');


	interface Panier{
		
		
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
		public function addProduct(Produit $p){
			$this->produits[count($this->produits)]=$p;
		}

		/**
		* Valide la commande
		*/
		public function validateOrder() {
			
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
		
	}

