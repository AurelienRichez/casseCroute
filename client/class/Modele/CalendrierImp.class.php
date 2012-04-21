<?php
require_once 'Calendrier.class.php';
include_once 'Constants.php';



class CalendrierImp implements Calendrier{

	private $db;
	private $dbFactory;


	public function __construct(DBFactory $dbFac){
		$this->dbFactory = $dbFac;
		$this->db = $dbFac->getDataBase();

	}

	public function validDay($date){

		//Cette fonction va d'abord vérifier que le jour choisi n'est pas un week end
		//puis va ensuite chercher dans la bas de donnée si cette date existe dans la table
		//(=sandwiches ce jour là)
		$this->checkDateFormat($date);//vérification de la validité
		$timestamp = strtotime($date);
		if(date('N',$timestamp)>=6 || $timestamp < strtotime($this->nextValidDay())){
			return false;
		}
		else{
			$result = $this->db->query('SELECT COUNT(*) AS nb FROM '.NAME_DB_CALENDRIER.' WHERE day="'.$date.'"');
			$result = $result->fetchAll();
			return $result[0]['nb']==1;

		}
	}

	public function enableDay($date){

		if(date('N',strtotime($date))<6){
			$this->checkDateFormat($date);
			$this->db->exec('INSERT INTO `'.NAME_DB_CALENDRIER.'` VALUES("'.$date.'")');
		}

	}

	public function disablePeriod($start,$end){
		$timestampStart = strtotime($start);
		$timestampEnd = strtotime($end);

		for($time=$timestampStart;$time<=$timestampEnd;$time+=86400){
			$this->disableDay(date('Y-m-d',$time));
		}
	}

	public function disableDay($date){

		$this->checkDateFormat($date);

		$this->db->exec('DELETE FROM '.NAME_DB_CALENDRIER.' WHERE day="'.$date.'"');
	}

	public function enablePeriod($start,$end){
		$timestampStart = strtotime($start);
		$timestampEnd = strtotime($end);

		for($time=$timestampStart;$time<=$timestampEnd;$time+=86400){
			$this->EnableDay(date('Y-m-d',$time));
		}
	}

	private function checkDateFormat($date){

		$valeurs = explode('-',$date);

		if(!(count($valeurs)==3 && checkdate($valeurs[1], $valeurs[2], $valeurs[0]))){
			throw new Exception('La date entrée n\'est pas valide : '.$date);
		}
	}

	public function nextValidDay($date=NULL) {

		//paramètres par défauts :
		if($date==NULL)
			$date = date('Y-m-d');
		$this->checkDateFormat($date);


		//vérification de l'heure :
		if($date==date('Y-m-d') && date('H')>=HEURE_LIMITE) {
			return $this->nextValidDay(date('Y-m-d',time()+86400));
		}

			
		$timestamp  = strtotime($date);


		$result = $this->db->query('SELECT * FROM '.NAME_DB_CALENDRIER.' WHERE day >= "'.$date.'"');
		$result = $result->fetchAll();
		if (count($result)==0) {
			throw new Exception('La date entrée est en dehors des prévisions : '.$date);
		}
		else {
			return $result[0]['day'];
		}
	}

	public function lastValidDay() {
		$req = $this->db->query('SELECT * FROM '.NAME_DB_CALENDRIER.' ORDER BY day DESC LIMIT 0,1');
		$result = $req->fetchAll();
		if(count($result)==1)
			return $result[0]['day'];
		else
			return NULL;
	}

	/**
	 * inverse le sens de la date. Par exemple retourne 11-10-2012 si on
	 * entre 2012-10-11. Sert pour les conversions au format us-français
	 * @param string $date la date inversée.
	 */
	public static function invDate($date) {
		$tabDate = explode('-', $date);
		return $tabDate[2].'-'.$tabDate[1].'-'.$tabDate[0];
	}


	public function __sleep() {
		return array('dbFactory');
	}

	public function __wakeup(){
		$this->db = $this->dbFactory->getDatabase();
	}

}