<?php
/*
* commandes.php
* created 5 avr. 2012
*/



function writeContent(User $user) {
	?>
	<h1>Vos commandes à venir</h1>
	<?php 
	$orders = $user->getOrders();
	if(count($orders)==0) {
		?>
		<p>Vous n'avez aucune commande à venir</p>
		
		<?php 
	}
	else{
		?>
		<table>
			<tr><td>date</td><td>produit</td><td>nombre</td><td></td></tr>
		<?php 
		foreach($orders as $o) {
			$products = $o->getProducts();
			echo '<tr>';
			echo '<td rowspan="'.count($products).'">'.date('d/m/Y',strtotime($o->getDate())).'</td>';
			echo '<td>'.$products[0]['prod']->getName().'</td>';
			echo '<td>'.$products[0]['nb'].'</td>';
			echo '<td rowspan="'.count($products).'"><a href="page-confirmation-suppression.html?id='.$o->getId().'">supprimer</a></td>';
			echo '</tr>';
			
			for($i=1;$i<count($products);$i++) {
				echo '<tr>';
				echo '<td>'.$products[$i]['prod']->getName().'<td>';
				echo '<td>'.$products[$i]['nb'].'</td>';
				echo '</tr>';
			}
		}
		?>
		
		</table>
		
		<?php 
	}
	echo '<p><a href="page-accueil.html">Retour à la page d\'accueil</a></p>';
}