<?php
/*
* DBFactory.class.php
* created 1 avr. 2012
*/

/**
 * Cette classe permet de renvoyer la base de donnée avec un pattern singleton.
 * Elle permet de régler le problème de la sérialization d'un objet PDO qui est
 * impossible (besoin de recréer la connexion à chaque script).
 */


interface DBFactory {

	
	
	/**
	 * retourne un objet PDO représentant la base de donnée
	 * @return PDO base de donnée
	 */
	public function getDataBase();
	
	/**
	 * sauvegarde toutes les variables d'instance sauf l'objet db de type PDO 
	 * qui ne peut pas être sérialisé
	 * @return multitype:string 
	 */
	function __sleep();
	
	function __wakeup();
}