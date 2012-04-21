<?php
/*
* panier.php
* created 5 avr. 2012
*/




function writeContent(User $user) {
	$basket = $user->getBasket();
	
	$prods = $basket->getProducts();
	
	
	echo '<h1>Panier</h1>';
	echo '<p>Commande pour le '.CalendrierImp::invDate($basket->getDate()).'</p>';
	
	echo '<table>';
	echo '<tr><td>produit</td><td>nombre</td><td></td></tr>';
	foreach ($prods as $p) {
		echo '<tr><td>'.$p['prod']->getName().'</td><td>'.$p['nb'].'</td>
		<td><form method="post">
			<label for="nb'.$p['prod']->getId().'">nombre : </label>
			<input type="text" name="nb" id="nb'.$p['prod']->getId().'" size="1" value="1" />
			<input type="hidden" name="id" value="'.$p['prod']->getId().'" />
			<input type="submit" value="supprimer" />
		</form></td></tr>';
	}
	echo '</table>';
	if($user->getBasket()->getNumberOfProducts()>0) {
		echo '<form method="post"><input type="hidden" name="validateOrder" /><input type="submit" value="valider la commande" /></form>';
	}
	
	echo '<p><a href ="page-accueil.html" >Retour à l\'accueil</a></p>';
}

function writeDeletedProduct(Produit $prod, $nb) {
	//les paramètes ne sont pas utilisés,ils le seront peut être ensuite
	//pour afficher quel produit a été supprimé
	echo '<p>Produit enlevé du panier</p>';
}

function writeValidatedOrder(User $user) {
	echo '<p>Commande validée. <a href="page-commandes.html">voir mes commandes</a></p>';
}