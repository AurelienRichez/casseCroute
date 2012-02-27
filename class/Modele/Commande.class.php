<?php

namespace modele;
	
	include_once('Produit.class.php');


	interface Commande{
	
		/**
		* retourne la date de la commande
		*/	
		public function getDate();

		/**
		* Retourne une liste de produits
		*/	
		public function getProducts();

	}
