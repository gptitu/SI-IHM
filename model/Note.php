<?php
	class Note{
		
		private $id = "";
		private $jeu = "";
		private $note = "";
		
		public function __construct($i, $j, $n){
			$this->id = $i;
			$this->jeu = $j;
			$this->note = $n;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getJeu(){
			return $this->jeu;
		}
		public function getNote(){
			return $this->note;
		}
		
	}
?>