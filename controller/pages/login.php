<?php

	

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<link rel="stylesheet" href=""/>
		<title>GameBuy - Login</title>
	
	</head>
	
	<body>
	
		<div>
		
			<div>
			
				<!-- CONNECTEZ-VOUS -->
				
				<div>
				
					<h3>Connectez-vous</h3>
				
				</div>
				
				<div>
				
					<form action="verifLogin.php" method="post">
					
						<div>
					
							<input type="text" name="username" placeholder="Nom d'utilisateur"/> 
						
						</div>
						
						<div>
						
							<input type="password" name="password" placeholder="Mots de passe"/> 
						
						</div>
						
						<div>
						
							<button type="submit">Se connecter</button>
						
						</div>
					
					</form>
				
				</div>
			
			</div>
			
			<div>
			
				<!-- INSCRIVEZ-VOUS -->
				
				<div>
				
					<h3>Inscrivez-vous</h3>
				
				</div>
				
				<div>
				
					<form action="verifSignup.php" method="post">
					
						<div>
						
							<input type="text" name="username" placeholder="Nom d'utilisateur"/>
						
						</div>
						
						<div>
						
							<input type="email" name="email" placeholder="Email"/>
						
						</div>
						
						<div>
						
							<input type="password" name="password" placeholder="Mots de passe"/>
						
						</div>
						
						<div>
						
							<input type="password" name="password2" placeholder="Confirmer mots de passe"/>
						
						</div>
						
						<div>
						
							<button type="submit">S'inscrire</button>
						
						</div>
					
					</form>
				
				</div>
			
			</div>
		
		</div>
	
	</body>

</html>