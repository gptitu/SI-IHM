<?php
	
	include('model.php');
	include('Constructeur.php');
	
	class ConstructeurDAO{
		
		private $constructeur;
		private $result;
		private $c = null;
		
		public function __construct(){
			
			$this->c = getConnexion("pgsql", 5432, "jeux", "postgres", "root");
			
		}		
		
		public function findConstructeur(){
			$this->result = $this->co->query("SELECT * from Constructeur");
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_constructeur = null;
			while($_constructeur = $this->result->fetch()){
				$constructeur[] = new Constructeur($_constructeur->id, $_constructeur->nom);
			} return $constructeur;
		}
		
		public function insertConstructeur($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
				if(!$this->exists($_constructeur)){
				
					$n = $this->bdd->exec("INSERT INTO Constructeur VALUES('".$_constructeur->getId()."', '".$_constructeur->getNom()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function deleteConstructeur($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
				$n = $this->bdd->exec("DELETE FROM Constructeur WHERE id='".$_constructeur->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function updateConstructeur($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
				$settings = "SET id='".$_constructeur->getId()."', nom='".$_constructeur->getNom()."'";
				
				$n = $this->bdd->exec("UPDATE Constructeur ".$settings." WHERE id='".$_constructeur->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$constructeurs[] = $this->findConstructeur();
			$i = 0;
			while($i <= count($constructeurs)){
					return $constructeurs[$i]->id." : ".$constructeurs[$i]->nom"<br/>";
					$i++;
			}
		}
		
	}
?>