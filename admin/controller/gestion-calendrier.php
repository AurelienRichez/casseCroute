<?php

//TODO à faire


require_once 'view/vueBase.php';
require_once 'view/gestion-calendrier.php';

$agenda = new CalendrierImp(DBFactoryMysql::getDBFactory());

if(isset($_GET['invalid_day'])) {
	$agenda->enableDay($_GET['invalid_day']);
}
if(isset($_GET['valid_day'])) {
	$agenda->disableDay($_GET['valid_day']);
}

$startMonth = date('n');
$startYear = date('Y');
if(isset($_GET['startmonth'])) {
	if($_GET['startmonth'] <= 12 && $_GET['startmonth'] >= 1) {
		$startMonth = $_GET['startmonth'];
	}
}
if (isset($_GET['startyear'])) {
	$startYear = $_GET['startyear'];
}

writeHead();
writeCalendar($startMonth, $startYear, new CalendrierImp(DBFactoryMysql::getDBFactory()));
writeFoot();