<?php

//TODO à faire

function writeProducts($products) {
	echo '<ul class="liste_prods">';
foreach($products as $p) {
		$description = $p->getDescription();
		$image = $p->getImage();
		$name = $p->getName();
		$id = $p->getID();
		$activated = $p->isAvailable();
	?>
	<li>
	<div class="cadre_produit_<?php if($activated) echo 'actif'; else echo 'inactif'; ?>">
	<h2><?php echo $name; ?></h2>
	<form method="post">
	<p><input type="hidden" name="id" value="<?php echo $id?>" />
	<?php 
	if($activated) {?>
		Ce produit est disponible à la vente.<br />
		<input type="hidden" name="desactivate" />
		<input type="submit" value="Désactiver ce produit" />
	<?php }
	else {?>
		Ce produit n'est pas disponible à la vente.<br />
		<input type="hidden" name="activate" />
		<input type="submit" value="Activer ce produit" />
	<?php }
	?>
	</p>
	</form>
	<p>
	<?php if($p->getImage()!=NULL) {echo '<img src="images/imgprod/'.$image.'.jpg" alt="image '.$name.'" />';} ?>
	<?php echo $description;?>
	</p>
	
</div>
</li>
	<?php 
	}
	echo '</ul>';
	
	echo '<p><a class="button" href="admin-ajout-produit.html">Ajouter un nouveau produit</a></p>';
}