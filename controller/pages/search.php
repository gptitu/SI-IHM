<?php

	require '../inc/model.php';
	require '../inc/CategorieDAO.php';
	require '../inc/ConstructeurDAO.php';
	require '../inc/JeuDAO.php';

	session_start();
	
	$tof = false;
	$recherches = null;
	
	if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
		
		if(isset($_SESSION["user"])){
			
			$tof = true;
			
		} else{
			
			session_destroy();
			
		}
		
	} else{
		
		session_destroy();
		
	}
	
	if(isset($_GET["searchCateg"]) || isset($_GET["searchText"])){
		
		$searchCateg = null;
		$searchText = null;
		$tof2 = true;
		
		$searchText = $_GET["searchText"];
		$searchCateg = $_GET["searchCateg"];
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
		
		$jeudao = new JeuDAO($bdd);
		
		if($searchCateg != "CA000" && $searchText != ""){
		
			$recherches = $jeudao->loadData("WHERE categorie='" . $searchCateg . "' AND nom LIKE '%" . $searchText . "%'");
		
		} else if($searchCateg == "CA000" && $searchText != ""){
			
			$recherches = $jeudao->loadData("WHERE nom LIKE '%" . $searchText . "%'");
			
		} else if($searchCateg != "CA000" && $searchText == ""){
			
			$recherches = $jeudao->loadData("WHERE categorie='" . $searchCateg . "'");
			
		} else{
			
			$tof2 = false;
			
		} if($tof2){
			
			if(!isset($_GET["page"])){
				
				$page = 1;
				
			} else{
				
				$page = $_GET["page"];
				
			}

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<link rel="stylesheet" href=""/>
		<title>GameBuy - Search</title>
	
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
			
				<div>
				
					<h3>Resultats pour '<?php echo $searchText; ?>' :</h3>
				
				</div><hr/>
				
				<div>
				
				<?php for($i = (5 * ($page-1)); $i < (5 * $page) && $i < count($recherches); $i++){ ?>
				
					<div>
					
						<div>
						
							<!-- IMAGE -->
						
						</div>
						
						<div>
						
							<!-- INFOS -->
							
							<div>
							
								<!-- NOTE -->
								
								<span><?php echo $recherches[$i]->getNote(); ?></span>
							
							</div>
							
							<div>
							
								<!-- TITRE -->
								
								<span><?php echo $recherches[$i]->getNom(); ?></span>
							
							</div>
							
							<div>
							
								<!-- PRIX -->
								
								<span><span>Prix</span> : <?php echo $recherches[$i]->getPrix(); ?></span>
							
							</div>
							
							<div>
							
								<!-- CATEGORIE -->
								
								<span><?php echo $recherches[$i]->getCategorie()->getCategorie(); ?></span>
							
							</div>
							
							<div>
							
								<!-- DESCRIPTION -->
								
								<span><?php echo $recherches[$i]->getDescription(); ?></span>
							
							</div>
							
							<div>
							
								<!-- VOIR -->
								
								<a href="fiche.php?id=<?php echo $recherches[$i]->getId(); ?>">Voir</a>
							
							</div>
						
						</div>
					
					</div>
				
				</div>
				
			<?php
			
					if($i < 5 * $page){
						echo '<br/>';
					}

				}
				
				$nbPage = (int)(count($recherches) / 5);
			
			?>
			
				<div>
				
					<!-- PAGINATION -->
					
					<?php for($i = 0; $i < $nbPage; $i++){ ?>
					
						<a href="search.php?page=<?php echo ($i+1); ?>&searchCateg=<?php echo $searchCateg; ?>&searchText=<?php echo $searchText; ?>"><?php echo ($i+1); ?></a>
					
					<?php } ?>
				
				</div>
			
			</div><hr/>
			
			<footer>
			
				
			
			</footer>
		
		</div>
	
	</body>

</html>

<?php 

		} else{
			
			header("Location:accueil.php?error=2");
			
		}

	} else{
		
		header("Location:accueil.php?error=1");
		
	}

?>