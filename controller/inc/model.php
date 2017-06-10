<?php

	function getConnexion($sgbd, $port, $db, $user, $mdp){
			
		static $bdd = null;
		if($port != 80){
			$url = $sgbd.":host=localhost;port=".$port.";dbname=".$db;
		} else{
			$url = $sgbd.":host=localhost;dbname=".$db;
		}
		
		try{
		
			$bdd = new PDO($url, $user, $mdp);
		
		} catch(Exception $e){
			
			die('Erreur : '.$e->getMessage());
			
		} return $bdd;
		
	}

?>