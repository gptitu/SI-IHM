<?php
	class Achat{
		
		private $id = "";
		private $utilisateur = null;
		private $jeu = null;
		private $datePayement = "";
		private $pu = "";
		
		public function __construct($i, $u, $j, $d, $p){
			$this->id = $i;
			$this->utilisateur = $u;
			$this->jeu = $j;
			$this->datePayement= $p;
			$this->password = $p;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getUtilisateur(){
			return $this->utilisteur;
		}
		public function getJeu(){
			return $this->jeu;
		}
		public function getDatePayement(){
			return $this->datePayement;
		}
		public function getPu(){
			return $this->pu;
		}
		
		public function toString(){
			return $this->id." : ".$this->utilisateur->getId()." : ".$this->jeu->getId()." : ".$this->datePayement." : ".$this->pu."<br/>";
		}
		
	}
?>