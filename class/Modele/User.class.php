<?php

namespace modele;

require_once 'Produit.class.php';

interface User {
	
	/**
	 * retourne un tableau de commandes représetnant les futures commandes de la personne
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
	 * ajoute un produit au panier de la personne
	 * @param Produit $product
	 */
	public function addProduct(Produit $product);
	
	
	/**
	 * enlève 1 du type produit de la liste
	 * @param Produit $product
	 */
	public function removeProduct(Produit $product);
	
	
	/**
	 * Valide la commande en cours et vide le panier
	 */
	public function validateOrder();
	
}