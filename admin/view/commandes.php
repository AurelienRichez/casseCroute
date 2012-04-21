<?php


/**
 * @param Commande[] $orders
 * @param string $dateFR
 */
function writeOrders($orders,$dateFR) {
	?>
	<h1>Commandes pour le <?php echo $dateFR; ?></h1>
	<ul>
	<?php foreach($orders as $o) {?>
	
	<li>Commande de <?php echo $o->getNameUser(),' ',$o->getSurnameUser(),' : ' ; 
	$products = $o->getProducts();
	echo '<table>';
	echo '<tr><td>produit</td><td>nombre</td></tr>';
	foreach ($products as $p) {
		echo '<tr><td>'.$p['prod']->getName().'</td><td>'.$p['nb'].'</td></tr>';
	}
	echo '</table>';
	?>
	</li>
	
	<?php }?>
	</ul>
	
	<?php 
}

/**
 * ecrit un message d'erreur. A appeler si la date demandée n'est pas valide.
 */
function writeNonValidDay($dateFR) {
	echo '<p class="error">La date '.$dateFR.' n\'est pas répértoriée comme étant 
	une journée où des produits seront en vente.<p>
	
	<p><a href="admin-accueil.html">Retour à l\'accueil de l\'administration</a></p>';
}