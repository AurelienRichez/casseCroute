<?php

use modele\CalendrierImp;
use modele\DBFactorySqlite;

require_once '../class/Modele/CalendrierImp.class.php';
require_once 'creationBaseTest.php';
require_once '../class/Modele/DBFactorySqlite.class.php';


$db = creer();

$calendrier = new CalendrierImp(new DBFactorySqlite($db));

try{
	
	$calendrier->enablePeriod('2012-04-25', '2012-05-11');
	$calendrier->enablePeriod('2012-03-25', '2012-04-27');
	$calendrier->disablePeriod('2012-04-01','2012-05-03');
	if($calendrier->validDay('2012-05-04')) {
		echo 'attendu : true, trouvé : true';
	}
	else {
		echo 'erreur, attendue false, trouvé : true';
	}

	if($calendrier->validDay('2012-04-03')) {
		echo '<br />erreur, attendu false, trouvé true';
	}
	else {
		echo '<br /> attendu : false, trouvé : false';
	}
	
	echo '<br />'.$calendrier->nextValidDay();
}
catch (Exception $e) {
	echo $e->getMessage();
}
