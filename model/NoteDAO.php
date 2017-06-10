<?php
	
	include('Note.php');
	
	class NoteDAO{
		
		private $notes;
		private $result;
		private $connexion = null;
		
		public function __construct($connexion){
			$this->connexion = $connexion;
		}		
		
		public function loadData($condition){
			$request = "SELECT * from Note";
			if($condition != null){
				$request = $request." ".$condition;
			}
			$this->result = $this->co->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_note = null;
			while($_note = $this->result->fetch()){
				$notes[] = new Note($_note->id, $_note->jeu, $_note->note);
			} return $notes;
		}
		
		public function insertData($_note){
			
			if($_note instanceof Note){
				
				if(!$this->exists($_note)){
				
					$n = $this->bdd->exec("INSERT INTO Note VALUES('".$_note->getId()."', '".$_note->getJeu()."', '".$_note->getNote()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type note ...'; }
			
		}
		
		public function deleteData($_note){
			
			if($_note instanceof Note){
				
				$n = $this->bdd->exec("DELETE FROM Note WHERE id='".$_note->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type note ...'; }
			
		}
		
		public function updateData($_note){
			
			if($_note instanceof Note){
				
				$settings = "SET id='".$_note->getId()."', jeu='".$_note->getJeu()."', note='".$_note->getNote()."'";
				
				$n = $this->bdd->exec("UPDATE Note ".$settings." WHERE id='".$_note->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$not[] = $this->loadData();
			$i = 0;
			while($i <= count($not)){
					echo $not[$i]->toString();
					$i++;
			}
		}
		
	}
?>