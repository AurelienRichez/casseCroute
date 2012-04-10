<?php
/*
* confirmation-suppression.php
* created 5 avr. 2012
*/



use modele\Commande;

/**
 * Ecrit le contenu correpondant à l'annonce de la suppression de la commande.
 */
function writeDeletedCommand() {
	echo '<p>La commande a bien été supprimée<p>';
	echo '<p><a href="page-accueil.html">Retour à l\'accueil</a><p>';
}

/**
 * Ecrit le contenu si la commande demandée est inconnue (ou si l'utilisateur 
 * tente de suppprimer une commande qui ne lui apartient pas).
 */
function writeUnknownOrder() {
	echo '<p>La commande sélectionnée est inconnue ou n\'est pas à votre nom</p>';
	echo '<p><a href="page-accueil.html">Retour à l\'accueil</a><p>';
}

/**
 * Ecrit le contenu correspondant à la demande de confirmation de la part de l'utilisateur.
 * @param Commande $order
 */
function writeConfirmDeletion(Commande $order) {
	$products = $order->getProducts();
	echo '<p>Confirmez vous la suppression de la commande suivante :</p>';
	
	echo '<table>';
	echo '	<tr><td colspan="2">Commande pour le '.date('d/m/Y',strtotime($order->getDate())).'</td></tr>';
	echo '	<tr><td>produit</td><td>nombre</td></tr>';
	foreach ($products as $p) {
		echo '<tr><td>'.$p['prod']->getName().'</td><td>'.$p['nb'].'</td></tr>';
	}
	echo '</table>';
	echo '<form method="post">
		<input name="confirmation" type="hidden" />
		<input type="submit" value="Je confirme la suppression" />
	</form>';
}