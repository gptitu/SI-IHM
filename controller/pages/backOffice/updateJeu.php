<?php

	if(isset($_GET["id"])){
		
		require '../../inc/model.php';
		require '../../inc/ConstructeurDAO.php';
		require '../../inc/CategorieDAO.php';
		require '../../inc/JeuDAO.php';
		
		$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
		$codao = new ConstructeurDAO($bdd);
		$cadao = new CategorieDAO($bdd);
		$jdao = new JeuDAO($bdd);
		
		$id = $_GET["id"];
		$jeu = $jdao->loadData("WHERE jeu.id='" . $id . "'");
		$constructeurs = $codao->loadData(null);
		$categories = $cadao->loadData(null);

?>

<div>

	<h2>Modification du jeu</h2>

</div>

<div>

	<form action="" method="post" enctype="multipart/form-data">
	
		<div>
		
			<label>Nom</label> : <input type="text" name="nom" value="<?php echo $jeu[0]->getNom(); ?>"/>
		
		</div>
		
		<div>
		
			<label>Categorie</label> : <select name="categorie">
			
				<?php for($i = 0; $i < count($categories); $i++){ ?>
				
					<option value="<?php echo $categories[$i]->getId(); ?>" <?php if($categories[$i]->getId() == $jeu[0]->getCategorie()->getId()){ echo 'selected'; } ?>>
						<?php echo $categories[$i]->getCategorie(); ?>
					</option>
				
				<?php } ?>
			
			</select>
		
		</div>
		
		<div>
		
			<label>Constructeur</label> : <select name="constructeur">
			
				<?php for($i = 0; $i < count($constructeurs); $i++){ ?>
				
					<option value="<?php echo $constructeurs[$i]->getId(); ?>" <?php if($constructeurs[$i]->getId() == $jeu[0]->getConstructeur()->getId()){ echo 'selected'; } ?>>
						<?php echo $constructeurs[$i]->getNom(); ?>
					</option>
				
				<?php } ?>
			
			</select>
		
		</div>
		
		<div>
		
			<label>Date de sortie</label> : <input type="date" name="dateSortie" value="<?php echo $jeu[0]->getDateSortie(); ?>"/>
		
		</div>
		
		<div>
		
			<label>Prix (Euro)</label> : <input type="number" name="prix" value="<?php echo $jeu[0]->getPrix(); ?>"/>
		
		</div>
		
		<div>
		
			<label>Lien youtube</label> : <input type="text" name="lien" value="<?php echo $jeu[0]->getLien(); ?>"/>
		
		</div>
		
		<div>
		
			<label>Couverture</label> : <input type="file" name="coverImage" value="<?php echo $jeu[0]->getImage(); ?>"/>
		
		</div>
		
		<div>
		
			<label>Capture d'ecran 1</label> : <input type="file" name="capture1"/>
		
		</div>
		
		<div>
		
			<label>Capture d'ecran 2</label> : <input type="file" name="capture2"/>
		
		</div>
		
		<div>
		
			<label>Capture d'ecran 3</label> : <input type="file" name="capture3"/>
		
		</div>
		
		<div>
		
			<label>Capture d'ecran 4</label> : <input type="file" name="capture4"/>
		
		</div>
		
		<div>
		
			<label>Capture d'ecran 5</label> : <input type="file" name="capture5"/>
		
		</div>
		
		<div>
		
			<label>Autre image</label> : <input type="file" name="otherImage"/>
		
		</div>
		
		<div>
		
			<button>Enregistrer</button>
		
		</div>
		
		<div>
		
			<a href="#">Annuler</a>
		
		</div>
	
	</form>

</div><br/>

<?php 

	} else{
		
		header("Location:accueil.php?error=1");
		
	}

?>