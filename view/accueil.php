<?php

/*
 * vue de l'accueil
 */

use modele\User;



function writeContent(User $user) {?>
	<nav>
	<ul>
	<li><a href="#" class="image-nav"><img
	src="images/sandwiches.png" alt="sandwiches" /></a><a href="#"
	class="text-nav">Liste des sandwiches</a></li>
	<li><a href="page-commandes.html" class="image-nav"><img alt="commandes"
	src="images/papier.png" /></a><a href="page-commandes.html" class="text-nav">Voir
	mes commandes</a></li>
	<li><a href="#" class="image-nav"><img alt="FAQ"
	src="images/FAQ.png" /></a><a href="#" class="text-nav">FAQ</a></li>
	</ul>
	</nav>
	
	
	<?php 
	$lastOrder = $user->getLastOrder();
	if ($lastOrder!=NULL) {
		$products = $lastOrder->getProducts();
			
		echo '<div class="lastorder">';
			
		echo '<p>Votre dernière commande :</p>';
		echo '<table>';
		echo '<tr><td>produit</td><td>nombre</td></tr>';
		foreach ($products as $p) {
			echo '<tr><td>'.$p['prod']->getName().'</td><td>'.$p['nb'].'</td></tr>';
		}
		echo '</table>';
		echo '<a href="#">Refaire cette commande pour le '.date('d/m/Y',strtotime($user->getCalendar()->nextValidDay())).'</a>';
		echo '</div>';
	}
	
	echo '<aside>
			<p>Casse croute est un système développé par des GSI pour
				faciliter la commande de sandwiches à l\'EMN</p>
		</aside>';
	
}
