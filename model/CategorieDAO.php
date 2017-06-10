<?php
	
	include('model.php');
	include('Categorie.php');
	
	class CategorieDAO{
		
		private $categorie;
		private $result;
		private $c = null;
		
		public function __construct(){
			
			$this->c = getConnexion("pgsql", 5432, "jeux", "postgres", "root");
			
		}		
		
		public function findCategorie(){
			$this->result = $this->co->query("SELECT * from Categorie");
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_categorie = null;
			while($_categorie = $this->result->fetch()){
				$categorie[] = new Categorie($_categorie->id, $_categorie->categorie);
			} return $categorie;
		}
		
		public function insertCategorie($_categorie){
			
			if($_categorie instanceof Categorie){
				
				if(!$this->exists($_categorie)){
				
					$n = $this->bdd->exec("INSERT INTO Categorie VALUES('".$_categorie->getId()."', '".$_categorie->getCategorie()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function deleteCategorie($_categorie){
			
			if($_categorie instanceof Categorie){
				
				$n = $this->bdd->exec("DELETE FROM Categorie WHERE id='".$_categorie->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function updateCategorie($_categorie){
			
			if($_categorie instanceof Categorie){
				
				$settings = "SET id='".$_categorie->getId()."', categorie='".$_categorie->getCategorie()."'";
				
				$n = $this->bdd->exec("UPDATE Categorie ".$settings." WHERE id='".$_categorie->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$categories[] = $this->findCategorie();
			$i = 0;
			while($i <= count($categories)){
					echo $categories[$i]->toString();
					$i++;
			}
		}
		
	}
?>