<?php
	class Utilisateur{
		
		private $id = "";
		private $username = "";
		private $email = "";
		private $password = "";
		private $admini = "";
		
		public function __construct($i, $u, $m, $p, $a){
			$this->id = $i;
			$this->username = $u;
			$this->email = $m;
			$this->password = $p;
			$this->admini = $a;
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
		public function getAdmini(){
			return $this->admini;
		}
		
		public function toString(){
			return $this->id." : ".$this->username." : ".$this->email." : ".$this->password." : ".$this->admini."<br/>";
		}
		
	}
?>