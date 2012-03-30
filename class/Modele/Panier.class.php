<?php

namespace modele;
	
	include_once('Produit.class.php');


	interface Panier{
		
		/**
		* retourne un tableau de produits
		*/		
		public function getProducts();
		
		/**
		* Retourne le nombre de produit dans le panier
		*/		

		public function getNumberOfProducts();

		/**
		* Ajoute un produit
		*/		
		public function addProduct(Produit $p, $nb = 1);

		/**
		 * selectionne la date
		 */
		public function setDate($date);
		
		/**
		 * retourne la date au format YYYY-MM-DD
		 */
		public function getDate();

		/**
		* Valide la commande
		*/
		public function validateOrder($name, $surname, $id_user);
		
		/**
		* supprime un produit
		*/		
		public function deleteProduct(Produit $p, $nb = 1);
		
		/**
		 * vide le panier
		 */
		public function deleteAll();
	}

