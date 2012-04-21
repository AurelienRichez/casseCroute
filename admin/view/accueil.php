<?php

function writeContent(Calendrier $cal) {
	?>
	<nav>
	<ul>
	<li><a href="admin-gestion-calendrier.html">Gestion du calendrier</a></li>
	<li><a href="admin-gestion-produits.html">Gestion des produits</a></li>
	</ul>
	</nav>
	<form action="admin-commandes.html" method="get">
		<label for="date_order">Voir les commandes pour le :<br />
		<input id="date_order" name="date_order" type="text" value="<?php echo CalendrierImp::invDate($cal->nextValidDay()); ?>"></label><br />
		<input type="submit" value="Valider" />
	</form>
	
	<form action="admin-produits-commandes.html" method="get">
		<label for="date_products">Voir la liste de produits commandes pour le :<br />
		<input id="date_products" name="date_products" type="text" value="<?php echo CalendrierImp::invDate($cal->nextValidDay()); ?>"></label><br />
		<input type="submit" value="Valider" />
	</form>
	
	<?php 
}