<?php

namespace modele;

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
		*retourne l'adresse absolue de l'image du produit
		*/
		public function getImage();

		/**
		* retourne la description du produit
		*/
		public function getDescription();

		/**
		* egalite
		*/	
		public function equals();	

	}
	