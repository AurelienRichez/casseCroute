<?php
//TODO à faire


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