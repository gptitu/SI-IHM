<?php
	class Jeu{
		
		private $id = "";
		private $nom = "";
		private $categorie = "";
		private $constructeur = "";
		private $dateSortie = "";
		private $prix = "";
		
		public function __construct($i, $n, $ca, $co, $ds, $p){
			$this->id = $i;
			$this->nom = $n;
			$this->categorie = $ca;
			$this->constructeur = $co;
			$this->dateSortie = $ds;
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
		public function getPrix(){
			return $this->prix;
		}
		
	}
?>