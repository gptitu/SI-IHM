<?php

	require '../inc/model.php';

	require '../inc/ConstructeurDAO.php';
	require '../inc/CategorieDAO.php';
	require '../inc/JeuDAO.php';
	require '../inc/OtherDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "JeuAchat", "postgres", "11111996rga");
	
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
	
	$condition = "ORDER BY jeu.dateSortie DESC LIMIT 3";
	$nouveautes = $jeudao->loadData($condition);
	
	$query = "SELECT jeu, COUNT(*) as nb
				FROM Achat GROUP BY jeu
				ORDER BY nb LIMIT 3";
	$decouvrir = $odao->loadData($query);

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<link rel="stylesheet" href=""/>
		<title></title> 
	
	</head>
	
	<body>
	
		<div>
		
			<header>
			
				<div>
				
					<!-- LOGO -->
				
				</div>
				
				<div>
				
					<!-- RECHERCHE -->
					
					<form action="" method="get">
					
						<div>
					
							<select name="searchCateg">
							
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
					
					<a href="#">Login</a>
				
				</div><hr>
				
				<div>
				
					<!-- A LA UNE -->
					
					<div>
					
						<!-- NOTE -->
						
						<span><?php echo $aLaUne[0]->getNote(); ?></span>
						
					
					</div>
					
					<div>
					
						<!-- TITRE DU JEU -->
						
						<a href="#"><?php echo $aLaUne[0]->getNom(); ?></a>
					
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
							
							$jeu = $jeudao->loadData("WHERE id='" . $topVentes[$i]->jeu . "'");
					
					?>
					
						<div>
						
							<div>
							
								<!-- IMAGE -->
							
							</div>
							
							<div>
							
								<!-- INFOS -->
								
								<div>
								
									<!-- NOTE -->
									
									<span><?php echo $jeu[0]->getNote(); ?></span>
								
								</div>
								
								<div>
								
									<!-- TITRE -->
									
									<a href="#"><?php echo $jeu[0]->getNom(); ?></a>
								
								</div>
								
								<div>
								
									<!-- PRIX -->
									
									<span><?php echo $jeu[0]->getPrix(); ?></span>
								
								</div>
								
								<div>
								
									<!-- CATEGORIE -->
									
									<span><?php echo $jeu[0]->getCategorie()->getCategorie(); ?></span>
								
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
									
									<a href="#"><?php echo $nouveautes[$i]->getNom(); ?></a>
								
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
							
							$jeu = $jeudao->loadData("WHERE id='" . $decouvrir[$i]->jeu . "'");
					
					?>
					
						<div>
						
							<div>
							
								<!-- IMAGE -->
							
							</div>
							
							<div>
							
								<!-- INFOS -->
								
								<div>
								
									<!-- NOTE -->
									
									<span><?php echo $jeu[0]->getNote(); ?></span>
								
								</div>
								
								<div>
								
									<!-- TITRE -->
									
									<a href="#"><?php echo $jeu[0]->getNom(); ?></a>
								
								</div>
								
								<div>
								
									<!-- PRIX -->
									
									<span><?php echo $jeu[0]->getPrix(); ?></span>
								
								</div>
								
								<div>
								
									<!-- CATEGORIE -->
									
									<span><?php echo $jeu[0]->getCategorie()->getCategorie(); ?></span>
								
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