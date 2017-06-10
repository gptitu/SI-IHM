<?php
	
	include('model.php');
	include('Utilisateur.php');
	
	class UtilisateurDao{
		
		private $user;
		private $result;
		private $c = null;
		
		public function __construct(){
			
			$this->c = getConnexion("pgsql", 5432, "jeux", "postgres", "root");
			
		}		
		
		public function findUser(){
			$this->result = $this->co->query("SELECT * from Utilisateur");
			$this->result->setFetchMode(PDO::FETCH_OBJ);
			$_utilisateur = null;
			while($_utilisateur = $this->result->fetch()){
				$user[] = new Utilisateur($_utilisateur->id, $_utilisateur->username, $_utilisateur->email, $_utilisateur->password);
			} return $user;
		}
		
		public function insertUser($_utilisateur){
			
			if($_utilisateur instanceof Utilisateur){
				
				if(!$this->exists($_utilisateur)){
				
					$n = $this->bdd->exec("INSERT INTO Utilisateur VALUES('".$_utilisateur->getId()."', '".$_utilisateur->getUsername()."', '".$_utilisateur->getEmail()."', '".$_utilisateur->getPassword()."')");
					return $n;
				
				} else{ echo 'Cet objet existe deja !'; }
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function deleteUser($_utilisateur){
			
			if($_utilisateur instanceof Utilisateur){
				
				$n = $this->bdd->exec("DELETE FROM Utilisateur WHERE id='".$_utilisateur->getId()."'");
				return $n;
				
			} else{ echo 'Erreur : cette variable n\'est pas un objet de type utilisateur ...'; }
			
		}
		
		public function updateUser($_utilisateur){
			
			if($_utilisateur instanceof Utilisateur){
				
				$settings = "SET id='".$_utilisateur->getId()."', username='".$_utilisateur->getUsername()."', email='".$_utilisateur->getEmail()."', password='".$_utilisateur->getPassword()."'";
				
				$n = $this->bdd->exec("UPDATE Utilisateur ".$settings." WHERE id='".$_utilisateur->getId()."'"); 
				return $n;
				
			} else{ echo 'Erreur'; }
			
		}
		
		public function showAll(){
			$users[] = $this->findUser();
			$i = 0;
			while($i <= count($user)){
					echo $users[i]->toString();
					$i++;
			}
		}		
		
	}
?>