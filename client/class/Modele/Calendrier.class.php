<?php

/**
 * 
 * 
 * interface gérant le calendrier qui regroupe les jours possibles pour commander
 * cela permet de gérer les vacances et les jours fériés ainsi que les week ends
 *
 */
interface Calendrier{
	
	
	/**
	 * retourne un booléen pour savoir si des sandwich seront disponibles
	 * ce jour là. 
	 * @param $date la date pour laquelle on veut vérifier, au format YYYY-MM-DD
	 */
	public function validDay($date);
	
	/**
	 * enlève un jour du calendrier
	 * @param  $date la date au format YYYY-MM-DD 
	 */
	public function disableDay($date);
	

	/**
	 * enlève une période du calendrier
	 * 
	 * @param $start le début de la période au format YYYY-MM-DD 
	 * @param $end la fin de la période au format YYYY-MM-DD 
	 */
	public function disablePeriod($start,$end);
	
	
	/**
	 *  autorise les commandes pour le jour passé en paramètres
	 * 
	 * @param $day  la date au format YYYY-MM-DD 
	 */
	public function enableDay($day);
	
	
	
	/**
	 * autorise les commandes sur une période donnée
	 * 
	 * @param $start début de la période au format YYYY-MM-DD 
	 * @param $end fin de la période au format YYYY-MM-DD 
	 */
	public function enablePeriod($start,$end);
	
	
	/**
	 * retourne le prochain jour valide parmis les jour suivant et aujourd'hui
	 */
	public function nextValidDay($date = NULL);
	
	/**
	 * Retourne le dernier jour valide du calendrier.
	 */
	public function lastValidDay();
	
	public function __sleep();
	
	public function __wakeup();
}

