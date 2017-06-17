<?php

	require '../inc/model.php';
	require '../inc/CategorieDAO.php';
	require '../inc/Utilisateur.php';

	session_start();
	
	/*$_SESSION["login"] = true;
	$_SESSION["user"] = new Utilisateur("U0007", "Gerard", "gerard@gmail.com", "mdpGerard");*/
	
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
	
	if($tof){
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
		
		$categdao = new CategorieDAO($bdd);

?>

<!DOCTYPE html>

<html>

	<head>
	
		<meta charset="utf-8"/>
		<link rel="stylesheet" href=""/>
		<title>GameBuy - Member space</title>
	
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
			
			</header>
			
			<div>
			
				<section>
				
					<div>
					
						<!-- IMAGE -->
					
					</div>
					
					<div>
					
						<!-- INFOS -->
					
						<div>
						
							<h3>Vos informations</h3>
						
						</div>
						
						<div>
						
							<form action="" method="post">
							
								<div>
								
									<input type="text" name="username" value="<?php echo $_SESSION["user"]->getUsername(); ?>" <?php if(!isset($_GET["modif"])){ ?>readonly<?php } ?>/>
								
								</div>
								
								<div>
								
									<input type="email" name="email" value="<?php echo $_SESSION["user"]->getEmail(); ?>" <?php if(!isset($_GET["modif"])){ ?>readonly<?php } ?>/>
								
								</div>
								
								<div>
								
								<input type="password" name="password" value="********" <?php if(!isset($_GET["modif"])){ ?>readonly<?php } ?>/>
								
								</div>
								
								<div>
								
								<input type="password" name="password2" value="********" <?php if(!isset($_GET["modif"])){ ?>readonly<?php } ?>/>
								
								</div>
								
								<div <?php if(!isset($_GET["modif"])){ ?>style="display:none;" <?php } ?>>
								
									<button type="submit">Enregistrer</button>
								
								</div>
							
							</form>
							
							<?php if(!isset($_GET["modif"])){ ?>
							
							<form action="memberSpace.php?modif=1" method="post">
							
								<div>
								
									<button type="submit">Modifier</button>
								
								</div>
							
							</form>
							
							<?php } ?>
						
						</div>
					
					</div>
				
				</section>
			
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