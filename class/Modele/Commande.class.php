<?php

namespace modele;
	
	include_once('Produit.class.php');


	interface Commande{
	
		/**
		* retourne la date de la commande
		*/	
		public function getDate();

		/**
		* Retourne un tableau de produits contenant le produit et le nom de ces
		* produits au format $tableau[nb]['prod] et $tableau[nb]['nb']
		*/	
		public function getProducts();
		
		/**
		 * Retourne le prénom de l'utilisateur à l'origine de la commande
		 * @return string prénom de l'utilisateur
		 */
		public function getNameUser();
		
		/**
		 * Retourne le nom de l'utilisateur à l'origine de la commande
		 * @return string nom de l'utilisateur
		 */		
		public function getSurnameUser();
		
		/**
		 * Retourne l'id de l'utilisateur à l'origine de la commande
		 * @return int id de l'utilisateur
		 */
		public function getIdUser();
		
		/**
		 * Retourne l'identfiant de la commande.
		 */
		public function getId();
		
		public function __sleep();
		
		public function __wakeup();

	}
