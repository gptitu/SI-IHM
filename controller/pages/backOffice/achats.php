<?php

	require '../../inc/model.php';
	require '../../inc/ConstructeurDAO.php';
	require '../../inc/CategorieDAO.php';
	require '../../inc/JeuDAO.php';
	require '../../inc/UtilisateurDAO.php';
	require '../../inc/AchatDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
	$adao = new AchatDAO($bdd);
	
	$limitation = 10;
	$achats = null;
	$nbp = 1;
	
	if(isset($_GET["limitation"])){
		
		$limitation = $_GET["limitation"];
		
	}
	
	if(isset($_GET["search"])){
		
		$achats = $adao->loadData(", Jeu jeu WHERE achat.jeu=jeu.id AND jeu.nom LIKE '%" . $_GET['search'] . "%'");
		
	} else{
		
		$achats = $adao->loadData("ORDER BY achat.id");
		
	} $nbM = count($achats);
	
	if(isset($_GET["nbp"])){
		
		$nbp = $_GET["nbp"];
		
	}

?>

<div>

	<div>
	
		<!-- LABEL -->
		
		<h2>Liste des achats</h2>
	
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
		
		<form action="#" method="get">
		
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
	
		<!-- LISTE DES ACHATS -->
		
		<table>
		
			<tr>
			
				<th>ID</th>
				<th>Nom d'utilisateur</th>
				<th>Jeu</th>
				<th>Date</th>
				<th>Montant</th>
				<th></th>
			
			</tr>
			
			<?php 
		
				$d = $limitation * ($nbp-1); 
				$f = $limitation * $nbp;
				for($i = $d; $i < $f && $i < count($achats); $i++){ 
				
			?>
			
				<tr>
				
					<td><?php echo $achats[$i]->getId(); ?></td>
					<td><?php echo $achats[$i]->getUtilisateur()->getUsername(); ?></td>
					<td><?php echo $achats[$i]->getJeu()->getNom(); ?></td>
					<td><?php echo $achats[$i]->getDatePayement(); ?></td>
					<td><?php echo $achats[$i]->getPu(); ?></td>
					<td></td>
				
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
	
		<!-- EXPORT CSV -->
		
		<a href="#">Export CSV</a>
	
	</div><br/>

</div><hr/>

<div>

	<h2>Nombre d'achats par mois :</h2>

</div><br/>