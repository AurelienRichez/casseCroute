<?php



/**
 * Ecrit la page correspondant au résumé des produits à fabriquer pour le jour donné
 * @param multitype $products les produit sour forme de tableau de la forme tab[idprod][name]
 * tab[idprod][nb]
 * @param string $dateFR
 */
function writeProducts($products,$dateFR) {
	?>
	<h1>Produits à préparer pour le <?php echo $dateFR ?></h1>
	
	<table>
	<tr><th>produit</th><th>nombre</th></tr>
	<?php 
	foreach($products as $p) {
		echo '<td>'.$p['name'].'</td><td>'.$p['nb'].'</td>';
	}
	?>
	</table>
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