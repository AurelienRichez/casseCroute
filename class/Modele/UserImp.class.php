<?php

	namespace modele;
	
	require_once 'PanierImp.class.php';
	require_once 'CalendrierImp.class.php';
	
	class UserImp implements User {
		
		private $basket;
		private $calendar;
		private $lastOrder = NULL;
		private $orders = NULL;
		
		
		function __construct(PDO $db) {
			$this->calendar = new CalendrierImp($db);
			$this->basket = new PanierImp($db, $this->calendar);
		}
		
		/**
		 * retourne un tableau de commandes représentant les futures commandes de la personne
		 */
		public function getOrders(){//TODO a implémenter
			
		}
		
		/**
		 * retourne la dernière commande faites par l'utilisateur ou null si aucune commande
		 * n'a est enregistré
		 */
		public function getLastOrder(){//TODO a implémenter
		}
		
		
		/**
		 * retourne le panier de l'utilisateur
		 */
		public function getBasket(){//TODO a implémenter
		}
		
		
		/**
		 * ajoute un produit au panier de la personne
		 * @param Produit $product
		 */
		public function addProduct(Produit $product){//TODO a implémenter
		}
		
		
		/**
		 * enlève 1 du type produit de la liste
		 * @param Produit $product
		 */
		public function removeProduct(Produit $product){//TODO a implémenter
		}
		
		
		/**
		 * Valide la commande en cours et vide le panier
		 */
		public function validateOrder(){//TODO a implémenter
		}
	}
	
	