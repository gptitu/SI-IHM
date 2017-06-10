<?php
	
	include('Commentaire.php');
	include('Utilisateur.php');
	include('UtilisateurDAO.php');
	include('Jeu.php');
	include('JeuDAO.php');
	
	class CommentaireDAO{
		
		private $comm;
		private $result;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}		
		
		public function loadData($condition){
			
			$request = "SELECT * from Commentaire";
			if($condition != null){
				$request = $request." ".$condition;
			}
			
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			
			$utilisateurdao = new UtilisateurDAO($this->bdd);
			$jeudao = new JeuDAO($this->bdd);
			$utilisateur = null;
			$jeu =null;
			$_commentaire = null;
			
			while($_commentaire = $this->result->fetch()){
				$utilisateur = $utilisateurdao->loadData("Where id = " . $_commentaire->utilisateur);
				$jeu = $jeudao->loadData("Where id = " . $_commentaire->jeu);
				$comm[] = new Commentaire($_commentaire->id, $utilisateur, $jeu, $_commentaire->dateCom, $_commentaire->commentaire);
			} return $comm;
		}
		
		public function insertData($_commentaire){
			
			if($_commentaire instanceof Commentaire){
				
				if(!$this->exists($_commentaire)){
				
					$n = $this->bdd->exec("INSERT INTO Commentaire VALUES('".$_commentaire->getId()."', '".$_commentaire->getUtilisateur()."', '".$_commentaire->getJeu()."', '".$_commentaire->getDateCom()."', '".$_commentaire->getCommentaire()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type commentaire ...'; }
			
		}
		
		public function deleteData($_commentaire){
			
			if($_commentaire instanceof Commentaire){
				
				$n = $this->bdd->exec("DELETE FROM Commentaire WHERE id='".$_commentaire->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type commentaire ...'; }
			
		}
		
		public function updateData($_commentaire){
			
			if($_commentaire instanceof Commentaire){
				
				$settings = "SET id='".$_commentaire->getId()."', utilisateur='".$_commentaire->getUtilisateur()."', jeu='".$_commentaire->getJeu()."', dateCom='".$_commentaire->getDateCom()."', commentaire='".$_commentaire->getCommentaire()."'";
				
				$n = $this->bdd->exec("UPDATE commentaire ".$settings." WHERE id='".$_commentaire->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$commentaires = $this->loadData(null);
			$i = 0;
			while($i < count($commentaires)){
					echo $commentaires[$i]->toString();
					$i++;
			}
		}
		
	}
?>