<?php

	require '../inc/model.php';

	require '../inc/ConstructeurDAO.php';
	require '../inc/CategorieDAO.php';
	require '../inc/JeuDAO.php';
	require '../inc/OtherDAO.php';
	require '../inc/Utilisateur.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
	
	$cgdao = new CategorieDAO($bdd);
	$jeudao = new JeuDAO($bdd);
	$odao = new OtherDAO($bdd);
	
	$categories = $cgdao->loadData(null);
	
	$condition = "ORDER BY jeu.note DESC LIMIT 1;";
	$aLaUne = $jeudao->loadData($condition);
	
	$query = "SELECT jeu, COUNT(*) as nb
				FROM Achat GROUP BY jeu
				ORDER BY nb DESC
				LIMIT 3";
	$topVentes = $odao->loadData($query);
	
	$condition2 = "ORDER BY jeu.dateSortie DESC LIMIT 3";
	$nouveautes = $jeudao->loadData($condition2);
	
	$query2 = "SELECT jeu, COUNT(*) as nb
				FROM Achat GROUP BY jeu
				ORDER BY nb LIMIT 3";
	$decouvrir = $odao->loadData($query2);
	
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
	
	if(isset($_GET["error"]) && $_GET["error"] == '2'){
		
		echo '<script>alert("Veuillez saisir quelque chose")</script>';
		
	}

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<link rel="stylesheet" href=""/>
		<title>GameBuy - Accueil</title> 
	
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
					
						<a href="login.php">Login</a>
						
					<?php } else{ ?>
					
						<a href="memberSpace.php"><?php echo $_SESSION["user"]->getUsername(); ?></a>
					
					<?php } ?>
				
				</div><hr>
				
				<div>
				
					<!-- A LA UNE -->
					
					<div>
					
						<!-- NOTE -->
						
						<span><?php echo $aLaUne[0]->getNote(); ?></span>
						
					
					</div>
					
					<div>
					
						<!-- TITRE DU JEU -->
						
						<a href="fiche.php?id=<?php echo $aLaUne[0]->getId(); ?>"><?php echo $aLaUne[0]->getNom(); ?></a>
					
					</div>
					
					<div>
					
						<!-- PRIX -->
						
						<span><span>Prix</span> : <?php echo $aLaUne[0]->getPrix(); ?> Euro</span>
					
					</div>
					
					<div>
					
						<!-- LIEN ACHAT -->
						
						<a href="#">Acheter</a>
					
					</div>
				
				</div><hr/>
				
				<div>
					
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
				
				</div><br/><hr/>
			
			</header>
			
			<div>
			
				<!-- CONTENU DE L'ACCUEIL -->
				
				<section>
				
					<!-- TOP VENTE -->
					
					<div>
					
						<span>Top vente</span>
					
					</div>
					
					<div>
					
						<a href="#">Voir plus</a>
					
					</div><br/>
					
					<div>
					
					<?php 
					
						for($i = 0; $i < count($topVentes); $i++){
							
							$jeu1 = $jeudao->loadData("WHERE id='" . $topVentes[$i]->jeu . "'");
					
					?>
					
						<div>
						
							<div>
							
								<!-- IMAGE -->
							
							</div>
							
							<div>
							
								<!-- INFOS -->
								
								<div>
								
									<!-- NOTE -->
									
									<span><?php echo $jeu1[0]->getNote(); ?></span>
								
								</div>
								
								<div>
								
									<!-- TITRE -->
									
									<a href="fiche.php?id=<?php echo $jeu1[0]->getId(); ?>"><?php echo $jeu1[0]->getNom(); ?></a>
								
								</div>
								
								<div>
								
									<!-- PRIX -->
									
									<span><?php echo $jeu1[0]->getPrix(); ?></span>
								
								</div>
								
								<div>
								
									<!-- CATEGORIE -->
									
									<span><?php echo $jeu1[0]->getCategorie()->getCategorie(); ?></span>
								
								</div>
							
							</div>
							
						</div>
						
					<?php 
					
							if($i < count($topVentes) - 1){
								echo '<br/>';
							}
						
						}
					
					?>
					
					</div>
				
				</section><hr/>
				
				<section>
				
					<!-- NOUVEAUTES -->
					
					<div>
					
						<span>Nouveautes</span>
					
					</div>
					
					<div>
					
						<a href="#">Voir plus</a>
					
					</div><br/>
					
					<div>
					
					<?php 
					
						for($i = 0; $i < count($nouveautes); $i++){
					
					?>
					
						<div>
						
							<div>
							
								<!-- IMAGE -->
							
							</div>
							
							<div>
							
								<!-- INFOS -->
								
								<div>
								
									<!-- NOTE -->
									
									<span><?php echo $nouveautes[$i]->getNote(); ?></span>
								
								</div>
								
								<div>
								
									<!-- TITRE -->
									
									<a href="fiche.php?id=<?php echo $nouveautes[$i]->getId(); ?>"><?php echo $nouveautes[$i]->getNom(); ?></a>
								
								</div>
								
								<div>
								
									<!-- PRIX -->
									
									<span><?php echo $nouveautes[$i]->getPrix(); ?></span>
								
								</div>
								
								<div>
								
									<!-- CATEGORIE -->
									
									<span><?php echo $nouveautes[$i]->getCategorie()->getCategorie(); ?></span>
								
								</div>
							
							</div>
							
						</div>
						
					<?php 
					
							if($i < count($nouveautes) - 1){
								echo '<br/>';
							}
						
						}
					
					?>
					
					</div>
				
				</section><hr/>
				
				<section>
				
					<!-- DECOUVRIR -->
					
					<div>
					
						<span>Decouvrir</span>
					
					</div>
					
					<div>
					
						<a href="#">Voir plus</a>
					
					</div><br/>
					
					<div>
					
					<?php 
					
						for($i = 0; $i < count($decouvrir); $i++){
							
							$jeu2 = $jeudao->loadData("WHERE id='" . $decouvrir[$i]->jeu . "'");
					
					?>
					
						<div>
						
							<div>
							
								<!-- IMAGE -->
							
							</div>
							
							<div>
							
								<!-- INFOS -->
								
								<div>
								
									<!-- NOTE -->
									
									<span><?php echo $jeu2[0]->getNote(); ?></span>
								
								</div>
								
								<div>
								
									<!-- TITRE -->
									
									<a href="fiche.php?id=<?php echo $jeu2[0]->getId(); ?>"><?php echo $jeu2[0]->getNom(); ?></a>
								
								</div>
								
								<div>
								
									<!-- PRIX -->
									
									<span><?php echo $jeu2[0]->getPrix(); ?></span>
								
								</div>
								
								<div>
								
									<!-- CATEGORIE -->
									
									<span><?php echo $jeu2[0]->getCategorie()->getCategorie(); ?></span>
								
								</div>
							
							</div>
							
						</div>
						
					<?php 
					
							if($i < count($decouvrir) - 1){
								echo '<br/>';
							}
						
						}
					
					?>
					
					</div>
				
				</section><hr/>
			
			</div>
			
			<footer>
			
				<p>A propos du site</p>
			
			</footer>
		
		</div>
	
	</body>

</html>