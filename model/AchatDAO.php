<?php
	
	include('Achat.php');
	include('Utilisateur.php');
	include('UtilisateurDAO.php');
	include('Jeu.php');
	include('JeuDAO.php');
	
	class AchatDAO{
		
		private $purchase;
		private $result;
		private $bdd = null;
		
		public function __construct($connexion){
			$this->bdd = $connexion;
		}	
		
		public function loadData($condition){
			
			$request = "SELECT * from Achat";
			if($condition != null){
				$request = $request." ".$condition;
			}
			
			$this->result = $this->bdd->query($request);
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			
			$utilisateurdao = new UtilisateurDAO($this->bdd);
			$jeudao = new JeuDAO($this->bdd);
			$utilisateur = null;
			$jeu =null;
			$_achat = null;
			
			while($_achat = $this->result->fetch()){
				$utilisateur = $utilisateurdao->loadData("Where id = " . $_achat->utilisateur);
				$jeu = $jeudao->loadData("Where id = " . $_achat->jeu);
				$purchase[] = new Achat($_achat->id, $utilisateur, $jeu, $_achat->datePayement, $_achat->pu);
			} return $purchase;
		}
		
		public function insertData($_achat){
			
			if($_achat instanceof Achat){
				
				if(!$this->exists($_achat)){
				
					$n = $this->bdd->exec("INSERT INTO Achat VALUES('".$_achat->getId()."', '".$_achat->getUtilisateur()."', '".$_achat->getJeu()."', '".$_achat->getDatePayement()."', '".$_achat->getPu()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type achat ...'; }
			
		}
		
		public function deleteData($_achat){
			
			if($_achat instanceof Achat){
				
				$n = $this->bdd->exec("DELETE FROM Achat WHERE id='".$_achat->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type achat ...'; }
			
		}
		
		public function updateData($_achat){
			
			if($_achat instanceof Achat){
				
				$settings = "SET id='".$_achat->getId()."', utilisateur='".$_achat->getUtilisateur()."', jeu='".$_achat->getJeu()."', datePayement='".$_achat->getDatePayement()."', pu='".$_achat->getPu()."'";
				
				$n = $this->bdd->exec("UPDATE Achat ".$settings." WHERE id='".$_achat->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$achats[] = $this->loadData();
			$i = 0;
			while($i <= count($achats)){
					echo $achats[$i]->toString();
					$i++;
			}
		}
		
	}
?>