<?php

/**
 * ecrit le début de la page jusqu'à l'endroit ou commence le contenu spécifique
 * à la page.
 */
function writeHead() {
	?>
	<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="design_base.css" />
<link rel="stylesheet" href="admin/design_admin.css" />
<script src="jquery/jquery-1.7.2.min.js"></script>
<script src="jquery/jquery.ui.core.js"></script>
<script src="jquery/jquery.ui.datepicker.min.js"></script>
<script src="jquery/jquery.ui.datepicker-fr.js"></script>
<link rel="stylesheet" href="jquery/themes/base/jquery.ui.all.css">

<title>Casse croute - Administration</title>
</head>
<body>
	<div id="main_container">
		<div id="banner">
			<img alt="logo EMN" src="images/logo-emn.png">
			<h1>Casse croute</h1>
		</div>
	
	<?php 
}

/**
 * ecrit la fin de page juste après le contenu. L'user passé en paramètre
 * est inutile pour le moment. Il pourra servir éventuellement si des
 * informations sur l'utilisateur doivent apparaitre en pied de page
 * @param User $user paramèter inutile pour le moment
 */
function writeFoot() {
	?>
	</div>
	<footer>
		<p><a class="button" href="admin-accueil.html">Retour à l'accueil de l'administration</a></p>

		<p>
			<a href="#">site de l'emn</a>
		</p>

	</footer>
</body>
</html>
<?php 
}