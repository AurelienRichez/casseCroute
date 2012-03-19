<?php

namespace modele;

require_once 'Produit.class.php';

interface User {
	
	/**
	 * retourne un tableau de commandes repr�setnant les futures commandes de la personne
	 */
	
	public function getOrders();
	
	/**
	 * retourne la derni�re commande faites par l'utilisateur ou null si aucune commande 
	 * n'a est enregistr�
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
	 * enl�ve 1 du type produit de la liste
	 * @param Produit $product
	 */
	public function removeProduct(Produit $product);
	
	
	/**
	 * Valide la commande en cours et vide le panier
	 */
	public function validateOrder();
	
}