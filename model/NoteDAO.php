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
		
		public function findUser(){
			$this->result = $this->co->query("SELECT * from Note");
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_note = null;
			while($_note = $this->result->fetch()){
				$notes[] = new Note($_note->id, $_note->jeu, $_note->note);
			} return $notes;
		}
		
		public function insertUser($_note){
			
			if($_note instanceof Note){
				
				if(!$this->exists($_note)){
				
					$n = $this->bdd->exec("INSERT INTO Note VALUES('".$_note->getId()."', '".$_note->getJeu()."', '".$_note->getNote()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type note ...'; }
			
		}
		
		public function deleteUser($_note){
			
			if($_note instanceof Note){
				
				$n = $this->bdd->exec("DELETE FROM Note WHERE id='".$_note->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type note ...'; }
			
		}
		
		public function updateUser($_note){
			
			if($_note instanceof Note){
				
				$settings = "SET id='".$_note->getId()."', jeu='".$_note->getJeu()."', note='".$_note->getNote()."'";
				
				$n = $this->bdd->exec("UPDATE Note ".$settings." WHERE id='".$_note->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		
	}
?>