<?php

	require '../inc/model.php';
	require '../inc/ConstructeurDAO.php';
	require '../inc/CategorieDAO.php';
	require '../inc/JeuDAO.php';

	session_start();
	
	$tof = false;
	
	if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
		
		if(isset($_SESSION["user"])){
			
			$tof = true;
			
		} else{
			
			session_destroy();
			
		}
		
	} else{
		
		session_destroy();
		
	}
	
	if(isset($_GET["id"])){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
		
		$jeudao = new JeuDAO($bdd);
		
		$jeu = $jeudao->loadData("WHERE id='" . $_GET["id"] . "'");

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<link rel="stylesheet" href=""/>
		<title>GameBuy - </title>
	
	</head>
	
	<body>
	
		<div>
		
			<header>
			
				<div>
				
					<!-- LOGO -->
					
					<a href="accueil.php">Logo</a>
				
				</div>
				
				<div>
				
					<!-- RECHERCHE -->
					
					<form action="search.php" method="get">
					
						<div>
					
							<select name="searchCateg">
							
									<option value="CA000">Toutes les categories</option>
							
								<?php for($i = 0; $i < count($categories); $i++){ ?>
							
									<option value="<?php echo $categories[$i]->getCategorie(); ?>"><?php echo $categories[$i]->getCategorie(); ?></option>
								
								<?php } ?>
							
							</select>
						
						</div>
						
						<div>
						
							<input type="text" name="searchText" />
						
						</div>
						
						<div>
						
							<button type="submit">Rechercher</button>
						
						</div>
					
					</form>
				
				</div>
				
				<div>
				
					<!-- LOGIN -->
					
					<?php if(!$tof){ ?>
					
						<a href="#loginSignup">Login</a> <!-- login.php -->
						
					<?php } else{ ?>
					
						<a href="memberSpace.php"><?php echo $_SESSION["user"]->getUsername(); ?></a>
					
					<?php } ?>
				
				</div><hr/>
				
				<div id="loginSignup">
				
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
				
				</div><br/>
			
			</header><hr/>
			
			<div>
			
				<section>
				
					<!-- LE JEU -->
					
					<div>
					
						<!-- TITRE -->
						
						<span><?php echo $jeu[0]->getNom(); ?></span>
					
					</div>
					
					<div>
					
						<!-- IMAGE -->
					
					</div>
					
					<div>
					
						<!-- INFOS -->
						
						<div>
						
							<div>
							
								<!-- EDITEUR -->
								
								<span><?php echo $jeu[0]->getConstructeur()->getNom(); ?></span>
							
							</div>
							
							<div>
							
								<!-- CATEGORIE -->
								
								<span><?php echo $jeu[0]->getCategorie()->getCategorie(); ?></span>
							
							</div>
							
							<div>
							
								<!-- DATE DE SORTIE -->
								
								<span><?php echo $jeu[0]->getDateSortie(); ?></span>
							
							</div>
						
						</div>
						
						<div>
						
							<!-- NOTE -->
							
							<span><?php echo $jeu[0]->getNote(); ?></span>
						
						</div>
						
						<div>
						
							<!-- DESCRIPTION -->
							
							<span><?php echo $jeu[0]->getDescription(); ?></span>
						
						</div>
						
						<div>
						
							<!-- PRIX -->
							
							<span><?php echo $jeu[0]->getPrix(); ?></span>
						
						</div>
						
						<div>
						
							<!-- LIEN ACHAT -->
							
							<a href="#divAchat">Acheter</a>
						
						</div>
					
					</div>
				
				</section><hr/>
				
				<section>
				
					<!-- CAPTURE D'ECRANS -->
					
					<div>
					
						<h3>Capture d'ecrans</h3>
					
					</div>
				
				</section><hr/>
				
				<section>
				
					<!-- VIDEO -->
					
					<div>
					
						<h3>En jeu</h3>
					
					</div>
				
				</section><hr/>
				
				<section>
				
					<!-- MEME CATEGORIE -->
					
					<div>
					
						<h3>De la meme categorie</h3>
					
					</div>
				
				</section><hr/>
				
				<section>
				
					<!-- SECTION ACHAT -->
					
					<div id="divAchat">
					
						<form action="" method="post">
						
							<div>
							
								<h3>Numero de carte de credit :</h3>
							
							</div>
						
							<div>
							
								<input type="text" name="creditCard" placeholder="HG65-HF64-JG53"/>
							
							</div>
							
							<div>
							
								<button>Acheter</button>
							
							</div>
						
						</form>
					
					</div>
				
				</section><br/><hr/>
			
			</div>
			
			<footer>
			
				
			
			</footer>
		
		</div>
	
	</body>

</html>

<?php 

	} else{
		
		header("Location:accueil.php");
		
	}

?>