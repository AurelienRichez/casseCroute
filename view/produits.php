<?php
/*
* produits.php
* created 5 avr. 2012
*/


use modele\Produit;

use modele\UserImp;

use modele\ProduitImp;

function writeContent(UserImp $user) {
	$produits = ProduitImp::getAllProducts($user->getDBFActory());//TODO
	
	foreach($produits as $p) {
		$description = $p->getDescription();
		$image = $p->getImage();
		$name = $p->getName();
		$id = $p->getID();
	?>
<div class="cadre_produit">
	<form method="post">
	<p>
		<input type="hidden" name="id" value="<?php echo $id?>" />
		<label for="nb<?php echo $id?>">nombre : </label><input type="text" name="nb" size="1" id="nb<?php echo $id?>" value="1" />
		<input type="submit" value="Ajouter au panier" />
	</p>
	</form>
	<p>
	<?php if($p->getImage()!=NULL) {echo '<img src="images/imgprod/'.$image.'.jpg" alt="image '.$name.'" />';} ?>
	<?php echo $description;?>
	</p>
	
</div>
	<?php 
	}
	echo '<p><a href="page-accueil.html">Retour à l\'accueil</a></p>';
}

function writeAddedProduct(Produit $prod, $nb) {
	
	echo '<p>';
	if($nb>1) {
		echo $nb.' produits de type '.$prod->getName().' ont été ajoutés au panier';
	}
	else {
		echo $nb.' produit de type '.$prod->getName().' a été ajouté au panier';
	}
	echo '<p>';
	
}