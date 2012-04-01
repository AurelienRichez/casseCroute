<?php
/*
* DBFactoryMysql.php
* created 1 avr. 2012
*/


namespace modele;

use \PDO;

require_once 'DBFactory.class.php';

class DBFactoryMysql implements DBFactory {

	private $db = NULL;
	private $id;
	private $db_name;
	private $host;
	private $pass;

	function __construct($host,$db_name,$id,$pass) {
		$this->host = $host;
		$this->id = $id;
		$this->db_name = $db_name;
		$this->pass = $pass;
	}


	/**
	 * retourne un objet PDO représentant la base de donnée
	 * @return PDO base de donnée
	 */
	public function getDataBase() {
		if($this->db = NULL) {
			$db =  new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->id, $this->pass); //TODO à changer lors de la mise en production
		}
		return $this->db;
	}

	/**
	 * sauvegarde toutes les variables d'instance sauf l'objet db de type PDO
	 * qui ne peut pas être sérialisé
	 * @return multitype:string
	 */
	function __sleep() {
		return (array('id','db_name','host','pass'));
	}

	function __wakeup() {
		$this->db = NULL;
	}
}