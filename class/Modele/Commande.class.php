<?php

namespace modele;
	
	include_once('Produit.class.php');


	interface Commande{
	
		/**
		* retourne la date de la commande
		*/	
		public function getDate();

		/**
		* Retourne un tableau de produits contenant le produit et le nom de ces produits
		*/	
		public function getProducts();
		
		public function __sleep();
		
		public function __wakeup();

	}
