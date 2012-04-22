<?php
function writeForm(Produit $product) {
	?>
	<form method="post" action="admin-edition-produit.html">
	<p>

	<label for="name" >Nom du produit à afficher pour le client : </label><br />
	<input type="text" id="name" name="name" value="<?php echo $product->getName();?>"><br />
	<label for="description">description du produit : </label><br />
	<textarea rows="3" cols="100" name="description"><?php echo $product->getDescription(); ?></textarea><br />
	<input type="hidden" name="id_edition" value="<?php echo $product->getID(); ?>" />
	<input type="submit" value="Editer le produit" />
	</p>
	</form>
	
	<?php
}

function writeProductEdited($name) {
	?>
	<p>Le produit <?php echo $name;?> a été édité. <a href="admin-gestion-produits.html">Liste des produits</a></p>
	<?php 
}