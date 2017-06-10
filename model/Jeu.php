<?php
	class Jeu{
		
		private $id = "";
		private $nom = "";
		private $categorie = null;
		private $constructeur = null;
		private $dateSortie = "";
		private $image = "";
		private $prix = "";
		
		public function __construct($i, $n, $ca, $co, $ds, $im, $p){
			$this->id = $i;
			$this->nom = $n;
			$this->categorie = $ca;
			$this->constructeur = $co;
			$this->dateSortie = $ds;
			$this->image = $im;
			$this->prix = $p;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getNom(){
			return $this->nom;
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
		public function getPrix(){
			return $this->prix;
		}
		
		public function toString(){
			return $this->id." : ".$this->nom." : ".$this->categorie->getId()" : ".$this->constructeur->getId()." : ".$this->dateSortie." : ".$this->image." : ".$this->prix."<br/>";
		}
		
	}
?>