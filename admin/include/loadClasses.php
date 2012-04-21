<?php
/*
* loadClasses.php
* created 19 avr. 2012
*/

function loadClass($class) {
	require_once '../client/class/Modele/'.$class.'.class.php';
}

function loadAdminClass($class) {
	require_once 'model/'.$class.'class.php';
}

spl_autoload_register('loadClass');
spl_autoload_register('loadAdminClass');