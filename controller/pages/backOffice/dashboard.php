<?php

	require '../../inc/model.php';
	require '../../inc/OtherDAO.php';
	
	$bdd = getConnexion("pgsql", "5432", "GameBuy", "postgres", "11111996rga");
	$odao = new OtherDAO($bdd);
	
	$chf = $odao->loadData("SELECT SUM(pu) as montant FROM Achat WHERE date_part('month', datePayement)=date_part('month', now())");
	
	$nbv = $odao->loadData("SELECT COUNT(id) as nb FROM Achat WHERE date_part('month', datePayement)=date_part('month', now());");

?>

<div>

	<!-- CHIFFRE D'AFFAIRE DU MOIS -->
	
	<div>
	
		<span>Chiffre d'affaire du mois :</span>
	
	</div>
	
	<div>
	
		<span><?php echo $chf[0]->montant; ?> Euro</span>
	
	</div>

</div>

<div>

	<!-- NB VENTE DU MOIS -->
	
	<div>
	
		<span>Nombre de ventes du mois :</span>
	
	</div>
	
	<div>
	
		<span><?php echo $nbv[0]->nb; ?> vente(s)</span>
	
	</div>

</div>

<div>

	<!-- JEU LE PLUS VENDU DU MOIS -->
	
	<span>Le jeu le plus vendu du mois :</span>

</div>

<div>

	<!-- JEU LE MIEUX NOTE DU MOIS -->
	
	<span>Jeu le mieux note du mois :</span>

</div>

<div>

	<!-- STATS DE VENTE DE L'ANNEE -->
	
	<h3>Statistiques de vente de l'annee :</h3>

</div>

<div>

	<!-- STATS DE CHIFFRE DE L'ANNEE -->
	
	<h3>Statistiques des chiffres d'affaire de l'annee :</h3>

</div>

<div>

	<!-- EXPORT PDF -->
	
	<a href="#">Export PDF</a>

</div>