<?php
/*
* loadclasses.php
* created 5 avr. 2012
*/

function loadClass($class) {
	require_once 'class/Modele/'.$class.'.class.php';
}

spl_autoload_register('loadClass');