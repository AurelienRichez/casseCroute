<?php
/*
* vueBase.php
* created 2 avr. 2012
*/

/*
 * page implémentant la base de la vue : header et footer.
 * à appeler lors de l'affichage de la vue.
 */
use modele\User;




/**
 * ecrit le début de la page jusqu'à l'endroit ou commence le contenu spécifique
 * à la page.
 */
function writeHead(User $user) {
	?>
	<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="design_base.css" />
<title>Casse croute - réservez vos sandwiches en ligne</title>
</head>
<body>
	<div id="main_container">
		<div id="banner">
			<img alt="logo EMN" src="images/logo-emn.png">
			<h1>Casse croute</h1>
		</div>
		<p id="connected">Connecté en tant que : <?php echo $user->getName(), ' ', $user->getSurname(); ?></p>
	
	<?php 
}

/**
 * ecrit la fin de page juste après le contenu. L'user passé en paramètre
 * est inutile pour le moment. Il pourra servir éventuellement si des
 * informations sur l'utilisateur doivent apparaitre en pied de page
 * @param User $user paramèter inutile pour le moment
 */
function writeFoot(User $user) {
	?>
	</div>
	<footer>
		<p>blablablabla</p>

		<p>
			<a href="#">site de l'emn</a>
		</p>

	</footer>
</body>
</html>
<?php 
}