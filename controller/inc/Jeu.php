<?php
	class Jeu{
		
		private $id = "";
		private $nom = "";
		private $description = "";
		private $categorie = null;
		private $constructeur = null;
		private $dateSortie = "";
		private $image = "";
		private $note = "";
		private $prix = "";
		
		public function __construct($i, $n, $d, $ca, $co, $ds, $im, $no, $p){
			$this->id = $i;
			$this->nom = $n;
			$this->description = $d;
			$this->categorie = $ca;
			$this->constructeur = $co;
			$this->dateSortie = $ds;
			$this->image = $im;
			$this->note = $no;
			$this->prix = $p;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getDescription(){
			return $this->description;
		}
		public function getCategorie(){
			return $this->categorie;
		}
		public function getConstructeur(){
			return $this->constructeur;
		}
		public function getDateSortie(){
			return $this->dateSortie;
		}
		public function getImage(){
			return $this->image;
		}
		public function getNote(){
			return $this->note;
		}
		public function getPrix(){
			return $this->prix;
		}
		
		public function toString(){
			return $this->id." : ".$this->nom." : ".$this->description." : ".$this->categorie->getId()." : ".$this->constructeur->getId()." : ".$this->dateSortie." : ".$this->image." : ".$this->note." : ".$this->prix."<br/>";
		}
		
	}
?>