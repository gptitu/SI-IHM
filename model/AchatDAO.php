<?php
	
	include('model.php');
	include('Achat.php');
	
	class AchatDAO{
		
		private $purchase;
		private $result;
		private $c = null;
		
		public function __construct(){
			
			$this->c = getConnexion("pgsql", 5432, "jeux", "postgres", "root");
			
		}		
		
		public function findAchat(){
			$this->result = $this->co->query("SELECT * from Achat");
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_achat = null;
			while($_achat = $this->result->fetch()){
				$purchase[] = new Achat($_achat->id, $_achat->utilisateur, $_achat->jeu, $_achat->datePayement, $_achat->pu);
			} return $purchase;
		}
		
		public function insertAchat($_achat){
			
			if($_achat instanceof Achat){
				
				if(!$this->exists($_achat)){
				
					$n = $this->bdd->exec("INSERT INTO Achat VALUES('".$_achat->getId()."', '".$_achat->getUtilisateur()."', '".$_achat->getJeu()."', '".$_achat->getDatePayement()."', '".$_achat->getPu()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type achat ...'; }
			
		}
		
		public function deleteAchat($_achat){
			
			if($_achat instanceof Achat){
				
				$n = $this->bdd->exec("DELETE FROM Achat WHERE id='".$_achat->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type achat ...'; }
			
		}
		
		public function updateAchat($_achat){
			
			if($_achat instanceof Achat){
				
				$settings = "SET id='".$_achat->getId()."', utilisateur='".$_achat->getUtilisateur()."', jeu='".$_achat->getJeu()."', datePayement='".$_achat->getDatePayement()."', pu='".$_achat->getPu()."'";
				
				$n = $this->bdd->exec("UPDATE Achat ".$settings." WHERE id='".$_achat->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$achats[] = $this->findAchat();
			$i = 0;
			while($i <= count($achats)){
					return $achats[$i]->id." : ".$achats[$i]->utilisateur." : ".$achats[$i]->jeu." : ".$achats[$i]->datePayement." : ".$achats[$i]->pu."<br/>";
					$i++;
			}
		}
		
	}
?>