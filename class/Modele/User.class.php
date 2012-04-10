<?php

require_once 'Produit.class.php';

interface User {
	
	
	/**
	 * retourne le prénom de l'utilisateur.
	 * @return string nom
	 */
	public function getName();
	
	/**
	 * retourne le nom de famille de l'utilisateur.
	 * @return string nom de famille 
	 */
	public function getSurname();
	
	/**
	 * retourne l'id de l'utilisateur.
	 * @return string id
	 */
	public function getId();
	
	
	/**
	 * retourne un tableau de commandes représentant les futures commandes de la personne
	 */
	
	public function getOrders();
	
	
	/**
	 * Retourne la fabrique de base de donnée.
	 * @return DBFactory fabrique de base de donnée
	 */
	public function getDBFactory();
	
	/**
	 * @param int $id l'id de la commande 
	 * @return Commande la commande d'id id si elle appartient bien à l'utilisateur, null sinon
	 */
	public function getOrder($id);
	
	/**
	 * retourne la dernière commande (commandé passée ou commade pour un 
	 * prochain jour) faites par l'utilisateur ou null si aucune commande n'est
	 * enregistrée
	 * @return Commande dernière commande réalisée
	 */
	public function getLastOrder();
	
	
	/**
	 * retourne le panier de l'utilisateur
	 * @return Panier le panier de l'utilisateur
	 */
	public function getBasket();
	
	/**
	 * @return Calendrier le calendrier 
	 */
	public function getCalendar();
	
	
	/**
	 * Valide la commande en cours et vide le panier
	 */
	public function validateOrder();
	
	/**
	 * Fonction vérifiant si la commande appartient bien à l'utilisateur 
	 * courant et supprimant la commande
	 * @param int $id
	 */
	public function deleteOrder($id);
	
	
	public function __sleep();
	
	public function __wakeup();
	
}