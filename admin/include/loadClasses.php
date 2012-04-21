<?php
/*
* loadClasses.php
* created 19 avr. 2012
*/

function loadAdminClass($class) {
	if(file_exists('model/'.$class.'.class.php')){
		require_once 'model/'.$class.'.class.php';
	}
	else {
		require_once '../client/class/Modele/'.$class.'.class.php';
	}
}


spl_autoload_register('loadAdminClass');