<?php
	
	include('model.php');
	include('Jeu.php');
	
	class JeuDao{
		
		private $game;
		private $result;
		private $c = null;
		
		public function __construct(){
			
			$this->c = getConnexion("pgsql", 5432, "jeux", "postgres", "root");
			
		}		
		
		public function findJeu(){
			$this->result = $this->co->query("SELECT * from Jeu");
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_game = null;
			while($_jeu = $this->result->fetch()){
				$game[] = new Jeu($_jeu->id, $_jeu->nom, $_jeu->categorie, $_jeu->constructeur, $_jeu->dateSortie, $_jeu->image, $_jeu->prix);
			} return $game;
		}
		
		public function insertJeu($_jeu){
			
			if($_jeu instanceof Jeu){
				
				if(!$this->exists($_jeu)){
				
					$n = $this->bdd->exec("INSERT INTO Jeu VALUES('".$_jeu->getId()."', '".$_jeu->getNom()."', '".$_jeu->getCategorie()."', '".$_jeu->getConstructeur()."', '".$_jeu->getDateSortie()."', '".$_jeu->getImage()."', '".$_jeu->getPrix()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type jeu ...'; }
			
		}
		
		public function deleteJeu($_jeu){
			
			if($_jeu instanceof Jeu){
				
				$n = $this->bdd->exec("DELETE FROM Jeu WHERE id='".$_jeu->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type jeu ...'; }
			
		}
		
		public function updateJeu($_jeu){
			
			if($_jeu instanceof Jeu){
				
				$settings = "SET id='".$_jeu->getId()."', nom='".$_jeu->getNom()."', categorie='".$_jeu->getCategorie()."', constructeur='".$_jeu->getConstructeur()."', dateSortie='".$_jeu->getDateSortie()."', image='".$_jeu->getImage()."', prix='".$_jeu->getPrix()."'";
				
				$n = $this->bdd->exec("UPDATE Jeu ".$settings." WHERE id='".$_jeu->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$jeux[] = $this->findJeu();
			$i = 0;
			while($i <= count($jeux)){
					return $jeux[$i]->id." : ".$jeux[$i]->nom." : ".$jeux[$i]->categorie." : ".$jeux[$i]->constructeur." : ".$jeux[$i]->dateSortie." : ".$jeux[$i]->image." : ".$jeux[$i]->prix."<br/>";
					$i++;
			}
		}
		
	}
?>