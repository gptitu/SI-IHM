<?php
	class Commentaire{
		
		private $id = "";
		private $jeu = "";
		private $dateCom = "";
		private $commentaire = "";
		
		public function __construct($i, $j, $d, $c){
			$this->id = $i;
			$this->jeu = $j;
			$this->dateCom = $d;
			$this->commentaire = $c;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getJeu(){
			return $this->jeu;
		}
		public function getDateCom(){
			return $this->dateCom;
		}
		public function getCommentaire(){
			return $this->commentaire;
		}
		
		public function toString(){
			return $this->id." : ".$this->jeu." : ".$this->dateCom." : ".$this->commentaire."<br/>";
		}
		
	}
?>