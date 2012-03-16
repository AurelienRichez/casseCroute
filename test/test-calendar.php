<?php
require_once '../class/Modele/CalendrierImp.class.php';
use modele\CalendrierImp;

try {
	$db = new PDO('mysql:host=localhost;dbname=test-casse-croute', 'root', '');
}
catch(PDOException $e) {
	echo $e->getMessage();
}

$calendrier = new CalendrierImp($db);

try{
	
	$calendrier->enablePeriod('2012-04-25', '2012-05-11');
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
}
catch (Exception $e) {
	echo $e->getMessage();
}
