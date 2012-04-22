<?php

function writeForm($articles) {
	?>
	<form method="post">
	<p>
	<label for="article">libellé du ticker dans la base du SIC - code : </label><br />
	<select id="article" name="article" >
		<?php 
		foreach ($articles as $a) {
			echo '<option value="'.$a['code'].'">'.$a['libelleTicket'].' - '.$a['code'].'</option>';
		}
		?>
	</select><br />
	<label for="name" >Nom du produit à afficher pour le client : </label><br />
	<input type="text" id="name" name="name"/><br />
	<label for="description">description du produit : </label><br />
	<textarea rows="3" cols="100" name="description"></textarea><br />
	
	<input type="submit" value="Ajouter le produit" />
	</p>
	</form>
	
	<?php
}

function writeProductAdded($name) {
	?>
	<p>Le produit <?php echo $name;?> a été ajouté. Vous pouvez l'activer sur la <a href="admin-gestion-produits.html">liste des produits</a></p>
	<?php 
}