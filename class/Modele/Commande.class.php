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
		
		public function __sleep();
		
		public function __wakeup();

	}
