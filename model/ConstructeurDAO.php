<?php
	
	include('Constructeur.php');
	
	class ConstructeurDAO{
		
		private $constructeur;
		private $result;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}			
		
		public function loadData($condition){
			
			$request = "SELECT * from Constructeur";
			if($condition != null){
				$request = $request." ".$condition;
			}
			
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			
			$_constructeur = null;
			
			while($_constructeur = $this->result->fetch()){
				$constructeur[] = new Constructeur($_constructeur->id, $_constructeur->nom);
			} return $constructeur;
		}
		
		public function insertData($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
				if(!$this->exists($_constructeur)){
				
					$n = $this->bdd->exec("INSERT INTO Constructeur VALUES('".$_constructeur->getId()."', '".$_constructeur->getNom()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function deleteData($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
				$n = $this->bdd->exec("DELETE FROM Constructeur WHERE id='".$_constructeur->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function updateData($_constructeur){
			
			if($_constructeur instanceof Constructeur){
				
				$settings = "SET id='".$_constructeur->getId()."', nom='".$_constructeur->getNom()."'";
				
				$n = $this->bdd->exec("UPDATE Constructeur ".$settings." WHERE id='".$_constructeur->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$constructeurs[] = $this->loadData();
			$i = 0;
			while($i <= count($constructeurs)){
					echo $constructeurs[$i]->toString();
					$i++;
			}
		}
		
	}
?>