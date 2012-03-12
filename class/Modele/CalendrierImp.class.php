<?php
namespace modele;
require_once 'Calendrier.class.php';

use PDO;

//TODO tester le calendrier

class CalendrierImp implements Calendrier{

	private $db;
	const NAME_DB = 'calendrier';


	public function __construct(PDO $db){
		$this->db = $db;

	}

	public function validDay($date){

		//Cette fonction va d'abord vérifier que le jour choisi n'est pas un week end
		//puis va ensuite chercher dans la bas de donnée si cette date existe dans la table
		//(=pas de sandwiches ce jour là)
		$this->checkDateFormat($date);
		
		if(date('N',strtotime($date))>=6){
			return false;
		}
		else{
			$result = $this->db->query('SELECT COUNT(*) AS nb FROM '.self::NAME_DB.' WHERE day='.$date);
			$result = $result->fetchAll();
			return $result[0]['nb']!=1;
				
		}
	}

	public function disableDay($date){


		$this->checkDateFormat($date);
		$this->db->exec('INSERT IGNORE INTO `'.self::NAME_DB.'` VALUES("'.$date.'")');
	}

	public function disablePeriod($start,$end){
		$timestampStart = strtotime($start);
		$timestampEnd = strtotime($end);

		for($time=$timestampStart;$time<=$timestampEnd;$time+=86400){
			$this->disableDay(date('Y-m-d',$time));
		}
	}

	public function enableDay($date){

		$this->checkDateFormat($date);

		$this->db->exec('DELETE FROM '.self::NAME_DB.' WHERE day="'.$date.'"');
	}

	public function enablePeriod($start,$end){
		$timestampStart = strtotime($start);
		$timestampEnd = strtotime($end);

		for($time=$timestampStart;$time<=$timestampEnd;$time+=86400){
			$this->EnableDay(date('Y-m-d',$time));
		}
	}

	private function checkDateFormat($date){
		if(!preg_match("#[0-9]{4}-[0-9]{2}-[0-9]{2}#", $date)){
			throw new Exception('La date entrée n\'est pas valide');
		}
	}
	
	public function nextValidDay() {
		//TODO à implémenter
	}

}