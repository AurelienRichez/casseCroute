<?php
	require_once '../class/Modele/CalendrierImp.class.php';
	use modele\CalendrierImp;
	$db = new PDO('mysql:host=localhost;dbname=test-casse-croute', 'root', '');
	$calendrier = new CalendrierImp($db);
	$calendrier->disablePeriod('2012-02-01','2012-05-03');
	$calendrier->enablePeriod('2012-02-25', '2012-04-11');