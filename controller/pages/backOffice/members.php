<?php

	require '../../inc/model.php';
	require '../../inc/UtilisateurDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
	$udao = new UtilisateurDAO($bdd);
	
	$limitation = 10;
	$membres = null;
	$nbp = 1;
	
	if(isset($_GET["limitation"])){
		
		$limitation = $_GET["limitation"];
		
	}
	
	if(isset($_GET["search"])){
		
		$membres = $udao->loadData("WHERE util.username LIKE '%" . $_GET["search"] . "%'");
		
	} else{
	
		$membres = $udao->loadData("ORDER BY util.id");
		
	} $nbM = count($membres);
	
	if(isset($_GET["nbp"])){
		
		$nbp = $_GET["nbp"];
		
	}

?>

<div>

	<!-- LABEL -->
	
	<h2>Liste des membres</h2>

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

	<!-- LISTE DE MEMBRES -->
	
	<table>
	
		<tr>
		
			<th>ID</th>
			<th>Nom d'utilisateur</th>
			<th>Email</th>
			<th>Mots de passe</th>
			<th></th>
		
		</tr>
		
		<?php 
		
			$d = $limitation * ($nbp-1); 
			$f = $limitation * $nbp;
			for($i = $d; $i < $f && $i < count($membres); $i++){ 
			
		?>
		
			<tr>
			
				<td><?php echo $membres[$i]->getId(); ?></td>
				<td><?php echo $membres[$i]->getUsername(); ?></td>
				<td><?php echo $membres[$i]->getEmail(); ?></td>
				<td>********</td>
				<td><a href="#" onclick="if(confirm('Vous en etes sur ?')){ window.location.href = '#'; }">Bannir</a></td>
			
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