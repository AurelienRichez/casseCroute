<?php
/*
* confirmation-suppression.php
* created 5 avr. 2012
*/


use modele\CommandeImp;

include_once 'view/vueBase.php';
include_once 'view/confirmation-suppression.php';

const DELETED_ORDER = 1;
const UNKNOWN_ORDER = 2;
const CONFIRM = 3;


$aAfficher;
$order;
if(isset($_GET['id'])) {
	$idASupprimer = $_GET['id'];
	if (isset($_POST['confirmation'])){
		$_SESSION['user']->deleteOrder($idASupprimer);
		$aAfficher = DELETED_ORDER;
	}
	else {
		$order = $_SESSION['user']->getOrder($idASupprimer);
		if($order = NULL) {
			$aAfficher = UNKNOWN_ORDER;
		}
		else {
			$aAfficher = CONFIRM;
		}
	}
	
}
else {
	header("location: page-accueil.html");
	exit;
}

//-----------------------[affichage]----------------------------------

writeHead($_SESSION['user']);
switch ($aAfficher){
	case DELETED_ORDER:
		writeDeletedCommand();
	break;
	case UNKNOWN_ORDER:
		writeUnknownOrder();
	break;
	case CONFIRM:
		writeConfirmDeletion($_SESSION['user']->getOrder($_GET['id']));	
	break;
	default:
		throw new Exception('Erreur dans confirmation-suppression, aucun affichage approprié');	
	break;
}
writeFoot($_SESSION['user']);