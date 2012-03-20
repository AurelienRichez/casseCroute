<?php

	namespace modele;
	
	require_once 'PanierImp.class.php';
	require_once 'CalendrierImp.class.php';
	require_once 'Constants.php';
	
	class UserImp implements User {
		
		private $db;
		
		private $id_user;
		private $name;
		private $surname;
		
		private $basket;
		private $calendar;
		private $lastOrder = NULL;
		private $orders = NULL;
		
		
		function __construct(PDO $db,$name,$surname,$id_user) {
			$this->$db=$db;
			
			$this->id_user = $id_user;
			$this->name = $name;
			$this->surname = $surname;
			
			$this->calendar = new CalendrierImp($db);
			$this->basket = new PanierImp($db, $this->calendar);
		}
		
		/**
		 * retourne un tableau de commandes représentant les futures commandes de la personne
		 */
		public function getOrders(){//TODO a implémenter
			//La fonction récupère les commande une première fois et n'est plus mise
			//à jour après. 
			//TODO envisager de créer une fonction forceMaj() pour mettre à jour les 
			//informations au besoin (à appeler après l'ajout ou la suppression d'une commande)
			if($this->orders == NULL){
				//TODO création des commandes
				$req = $this->db->prepare('SELECT * FROM '.NAME_DB_COMMANDE.' WHERE id_user=:id_user AND ');
			}
			
			return $this->orders;
		}
		
		/**
		 * retourne la dernière commande faites par l'utilisateur ou null si aucune commande
		 * n'a est enregistré
		 */
		public function getLastOrder(){//TODO a implémenter
			if($this->lastOrder == NULL) {
				//TODO création de la dernière commande
			}
			
			return $this->lastOrder; 
		}
		
		
		/**
		 * retourne le panier de l'utilisateur
		 */
		public function getBasket(){
			return $this->basket;
		}
		
		
		/**
		 * ajoute un produit au panier de la personne
		 * @param Produit $product
		 */
		public function addProduct(Produit $product, $nb = 1){
			$this->basket->addProduct($product);
		}
		
		
		/**
		 * enlève 1 du type produit de la liste
		 * @param Produit $product
		 */
		public function removeProduct(Produit $product){
			$this->basket->deleteProduct($product);
		}
		
		
		/**
		 * Valide la commande en cours et vide le panier
		 */
		public function validateOrder(){
			$this->basket->validateOrder();
		}
	}
	
	