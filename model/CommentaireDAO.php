<?php
	
	include('model.php');
	include('Commentaire.php');
	
	class CommentaireDAO{
		
		private $comm;
		private $result;
		private $c = null;
		
		public function __construct(){
			
			$this->c = getConnexion("pgsql", 5432, "jeux", "postgres", "root");
			
		}		
		
		public function findCommentaire(){
			$this->result = $this->co->query("SELECT * from Commentaire");
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_commentaire = null;
			while($_commentaire = $this->result->fetch()){
				$comm[] = new Commentaire($_commentaire->id, $_commentaire->jeu, $_commentaire->dateCom, $_commentaire->commentaire);
			} return $comm;
		}
		
		public function insertCommentaire($_commentaire){
			
			if($_commentaire instanceof Commentaire){
				
				if(!$this->exists($_commentaire)){
				
					$n = $this->bdd->exec("INSERT INTO Commentaire VALUES('".$_commentaire->getId()."', '".$_commentaire->getJeu()."', '".$_commentaire->getDateCom()."', '".$_commentaire->getCommentaire()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type commentaire ...'; }
			
		}
		
		public function deleteCommentaire($_commentaire){
			
			if($_commentaire instanceof Commentaire){
				
				$n = $this->bdd->exec("DELETE FROM Commentaire WHERE id='".$_commentaire->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type commentaire ...'; }
			
		}
		
		public function updateCommentaire($_commentaire){
			
			if($_commentaire instanceof Commentaire){
				
				$settings = "SET id='".$_commentaire->getId()."', jeu='".$_commentaire->getJeu()."', dateCom='".$_commentaire->getDateCom()."', commentaire='".$_commentaire->getCommentaire()."'";
				
				$n = $this->bdd->exec("UPDATE commentaire ".$settings." WHERE id='".$_commentaire->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		
	}
?>