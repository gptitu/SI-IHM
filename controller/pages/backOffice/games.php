<?php

	require '../../inc/model.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/JeuDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
	$codao = new ConstructeurDAO($bdd);
	$cadao = new CategorieDAO($bdd);
	$jdao = new JeuDAO($bdd);
	
	$limitation = 10;
	$jeux = null;
	$constructeurs = $codao->loadData(null);
	$categories = $cadao->loadData(null);
	$nbp = 1;
	
	if(isset($_GET["limitation"])){
		
		$limitation = $_GET["limitation"];
		
	}
	
	if(isset($_GET["search"])){
		
		$jeux = $jdao->loadData("WHERE jeu.nom LIKE '%" . $_GET["search"] . "%'");
		
	} else{
		
		$jeux = $jdao->loadData("ORDER BY jeu.id");
		
	} $nbM = count($jeux);
	
	if(isset($_GET["nbp"])){
		
		$nbp = $_GET["nbp"];
		
	}

?>

<div>

	<div>
	
		<!-- LABEL -->
		
		<h2>Liste des jeux</h2>
	
	</div>
	
	<div>
	
		<!-- LIMITATION -->
		
		<form action="accueil.php" method="get">
		
			<div>
			
				<label>Limitation de </label>
			
			</div>
			
			<div hidden=true>
		
				<input type="text" name="page" value="<?php echo $page; ?>"/>
			
			</div>
			
			<div>
			
				<input type="number" name="limitation" value="<?php echo $limitation; ?>"/>
			
			</div>
			
			<div>
			
				<button>Limiter</button>
			
			</div>
		
		</form>
	
	</div>
	
	<div>
	
		<!-- RECHERCHE -->
		
		<form action="accueil.php" method="get">
		
			<div hidden=true>
		
				<input type="text" name="page" value="<?php echo $page; ?>"/>
			
			</div>
		
			<div>
			
				<input type="text" name="search" placeholder="Recherche"/>
			
			</div>
			
			<div>
			
				<button>Rechercher</button>
			
			</div>
		
		</form>
	
	</div>
	
	<div>
	
		<!-- LISTE DE JEUX -->
		
		<table>
		
			<tr>
			
				<th>ID</th>
				<th>Nom</th>
				<th>Categorie</th>
				<th>Constructeur</th>
				<th>Date de sortie</th>
				<th>Prix</th>
				<th></th>
				<th></th>
			
			</tr>
			
			<?php 
		
				$d = $limitation * ($nbp-1); 
				$f = $limitation * $nbp;
				for($i = $d; $i < $f && $i < count($jeux); $i++){ 
				
			?>
			
				<tr>
				
					<td><?php echo $jeux[$i]->getId(); ?></td>
					<td><?php echo $jeux[$i]->getNom(); ?></td>
					<td><?php echo $jeux[$i]->getCategorie()->getCategorie(); ?></td>
					<td><?php echo $jeux[$i]->getConstructeur()->getNom(); ?></td>
					<td><?php echo $jeux[$i]->getDateSortie(); ?></td>
					<td><?php echo $jeux[$i]->getPrix(); ?></td>
					<td><a href="accueil.php?page=updateJeu&id=<?php echo $jeux[$i]->getId(); ?>">Modifier</a></td>
					<td><a href="#" onclick="if(confirm('Vous en etes sur ?')){ window.location.href = '#'; }">Supprimer</a></td>
				
				</tr>
			
			<?php } ?>
		
		</table>
	
	</div>
	
	<div>
	
		<!-- LIMITATION 2 -->
		
		<span>Affichage de <?php echo ($d+1); ?> a <?php if($f < $nbM) echo $f;  else echo $nbM; ?> sur <?php echo $nbM; ?></span>
	
	</div>
	
	<div>
	
		<!-- PAGINATION -->
		
		<div>
		
			<!-- PREV -->
			
			<a href="#">Precedent</a>
		
		</div>
		
		<div>
		
			<!-- LES PAGES -->
			
			<?php 
		
				$np = $nbM / $limitation;
				
				for($i = 0; $i < $np; $i++){
			
			?>
			
				<a href="accueil.php?<?php echo $_SERVER['QUERY_STRING'] . '&nbp=' . ($i+1); ?>"><?php echo ($i+1); ?></a>
			
			<?php } ?>
		
		</div>
		
		<div>
		
			<!-- NEXT -->
			
			<a href="#">Suivant</a>
		
		</div>
	
	</div>
	
	<div>
	
		<!-- EXPORT PDF -->
		
		<a href="#">Export PDF</a>
	
	</div>
	
	<div>
	
		<!-- EXPORT CSV -->
		
		<a href="#">Export CSV</a>
	
	</div>

</div><hr/>

<div>

	<div>
	
		<h2>Ajouter un jeu</h2>
	
	</div>
	
	<div>
	
		<form action="#" method="post" enctype="multipart/form-data">
		
			<div>
			
				<label>Nom</label> : <input type="text" name="nom" placeholder="Nom"/>
			
			</div>
			
			<div>
			
				<label>Categorie</label> : <select name="categorie">
				
					<?php for($i = 0; $i < count($categories); $i++){ ?>
				
						<option value="<?php echo $categories[$i]->getId(); ?>">
							<?php echo $categories[$i]->getCategorie(); ?>
						</option>
					
					<?php } ?>
				
				</select>
			
			</div>
			
			<div>
			
				<label>Constructeur</label> : <select name="constructeur">
				
					<?php for($i = 0; $i < count($constructeurs); $i++){ ?>
				
						<option value="<?php echo $constructeurs[$i]->getId(); ?>">
							<?php echo $constructeurs[$i]->getNom(); ?>
						</option>
					
					<?php } ?>
				
				</select>
			
			</div>
			
			<div>
			
				<label>Date de sortie</label> : <input type="date" name="dateSortie"/>
			
			</div>
			
			<div>
			
				<label>Prix (Euro)</label> : <input type="number" name="prix" placeholder="Prix"/>
			
			</div>
			
			<div>
			
				<label>Lien</label> : <input type="text" name="lien" placeholder="Lien gameplay youtube"/>
			
			</div>
			
			<div>
			
				<label>Couverture</label> : <input type="file" name="coverImage" placeholder="Image de couverture">
			
			</div>
			
			<div>
			
				<label>Capture d'ecran</label> : <input type="file" name="capture1" placeholder="Capture d'ecran 1"/>
			
			</div>
			
			<div>
			
				<label>Capture d'ecran</label> : <input type="file" name="capture2" placeholder="Capture d'ecran 2"/>
			
			</div>
			
			<div>
			
				<label>Capture d'ecran</label> : <input type="file" name="capture3" placeholder="Capture d'ecran 3"/>
			
			</div>
			
			<div>
			
				<label>Capture d'ecran</label> : <input type="file" name="capture4" placeholder="Capture d'ecran 4"/>
			
			</div>
			
			<div>
			
				<label>Capture d'ecran</label> : <input type="file" name="capture5" placeholder="Capture d'ecran 5"/>
			
			</div>
			
			<div>
			
				<label>Autre image</label> : <input type="file" name="otherImage" placeholder="Autre image"/>
			
			</div>
			
			<div>
			
				<button>Enregistrer</button>
			
			</div>
		
		</form>
	
	</div>

</div><br/>