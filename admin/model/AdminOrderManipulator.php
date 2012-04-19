<?php

class AdminOrderManipulator {
	
	public static function getOrdersForDay(PDO $db, $day) {
		$req = $db->query('SELECT id FROM '.NAME_DB_COMMANDE.' WHERE day="'.$day.'"');
		
		$result = $req->fetchAll();
		$toReturn;
		for($i=0;$i<count($result);$i++) {
			$toReturn[$i] = new CommandeImp(DBFactoryMysql::getDBFactory(), $result[$i]['id']);
		}
		return  $toReturn;
	}
	
	public static function getProductsForDay(PDO $db, $day) {
		$req = $db->query('SELECT * FROM '.NAME_DB_PROD_COMM.' op
							INNER JOIN '.NAME_DB_COMMANDE.' o
							ON op.id_order = o.id_order
							INNER JOIN '.NAME_DB_SELLABLE_PROD.' sp
							ON op.id_product = sp.id_product
							WHERE day="'.$day.'"');
		$result = $req->fetchAll();
		$toReturn = array();
		
		foreach($result as $r) {
			if(isset($toReturn[$r['id_product']])) {
				$toReturn[$r['id_product']]['nb']+= $r['nb_product']; 
			}
			else {
				$toReturn[$r['id_product']]['name'] = $r['name'];
				$toReturn[$r['id_product']]['nb'] = $r['nb_product'];
			}
		}
		return $toReturn;
	}
}