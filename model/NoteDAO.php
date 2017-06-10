<?php
	
	include('model.php');
	include('Note.php');
	
	class NoteDAO{
		
		private $notes;
		private $result;
		private $c = null;
		
		public function __construct(){
			
			$this->c = getConnexion("pgsql", 5432, "jeux", "postgres", "root");
			
		}		
		
		public function findNote(){
			$this->result = $this->co->query("SELECT * from Note");
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_note = null;
			while($_note = $this->result->fetch()){
				$notes[] = new Note($_note->id, $_note->jeu, $_note->note);
			} return $notes;
		}
		
		public function insertNote($_note){
			
			if($_note instanceof Note){
				
				if(!$this->exists($_note)){
				
					$n = $this->bdd->exec("INSERT INTO Note VALUES('".$_note->getId()."', '".$_note->getJeu()."', '".$_note->getNote()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type note ...'; }
			
		}
		
		public function deleteNote($_note){
			
			if($_note instanceof Note){
				
				$n = $this->bdd->exec("DELETE FROM Note WHERE id='".$_note->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type note ...'; }
			
		}
		
		public function updateNote($_note){
			
			if($_note instanceof Note){
				
				$settings = "SET id='".$_note->getId()."', jeu='".$_note->getJeu()."', note='".$_note->getNote()."'";
				
				$n = $this->bdd->exec("UPDATE Note ".$settings." WHERE id='".$_note->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$not[] = $this->findNote();
			$i = 0;
			while($i <= count($not)){
					return $not[$i]->id." : ".$not[$i]->jeu." : ".$not[$i]->note."<br/>";
					$i++;
			}
		}
		
	}
?>