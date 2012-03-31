<?php

namespace modele;

require_once 'Produit.class.php';

interface User {
	
	/**
	 * retourne un tableau de commandes représentant les futures commandes de la personne
	 */
	
	public function getOrders();
	
	/**
	 * retourne la dernière commande faites par l'utilisateur ou null si aucune commande 
	 * n'a est enregistré
	 */
	public function getLastOrder();
	
	
	/**
	 * retourne le panier de l'utilisateur
	 */
	public function getBasket();
	
	
	/**
	 * Valide la commande en cours et vide le panier
	 */
	public function validateOrder();
	
}