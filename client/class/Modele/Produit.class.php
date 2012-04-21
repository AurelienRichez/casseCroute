<?php


	interface Produit{
		
		/**
		*retourne le nom du produit
		*/		
		public function getName();

		/**
		* retourne l'id du produit
		*/		
		public function getID();

		/**
		* retourne le prix du produit
		*/	
		public function getPrice();
		
		/**
		*retourne l'adresse absolue de l'image du produit si elle existe
		*/
		public function getImage();

		/**
		* retourne la description du produit
		* @return string description
		*/
		public function getDescription();
		
		/**
		 * Retourne true si le produit est disponible à la vente
		 * @return boolean 
		 */
		public function isAvailable();

		/**
		* egalite
		*/	
		public function equals(Produit  $p);	
		
		public function __sleep();
		
		public function __wakeup();

	}
	