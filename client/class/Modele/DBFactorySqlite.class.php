<?php
/*
* DBFactorySqlite.class.php
* created 1 avr. 2012
*/


require_once 'DBFactory.class.php';



/**
 * classe créée uniquement à des fins de tests unitaires. Cette base s'appuie
 * sur une base de données SQLite, et n'est pas conservée en l'état entre deux
 * scripts.
 */
class DBFactorySqlite implements DBFActory {
	
	private $db;
	
	function __construct(PDO $db) {
		$this->db = $db;
	}

	/**
	 * retourne un objet PDO représentant la base de donnée
	 * @return PDO base de donnée
	 */
	public function getDataBase(){
		return $this->db;
	}
	
	function __sleep() {
		return array();
	}
	
	function __wakeup() {
		include_once 'test/creationBaseTest.php';
		$this->db = creer();
		remplirBaseTest($this->db);
		
	}
	
}