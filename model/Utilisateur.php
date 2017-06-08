<?php
	class Utilisateur{
		
		private $id = "";
		private $username = "";
		private $email = "";
		private $password = "";
		
		public function __construct($i, $u, $m, $p){
			$this->id = $i;
			$this->username = $u;
			$this->email = $m;
			$this->password = $p;
		}
		
		public function getId(){
			return $this->id;
		}
		public function getUsername(){
			return $this->username;
		}
		public function getEmail(){
			return $this->email;
		}
		public function getPassword(){
			return $this->password;
		}
		
	}
?>