<?php include "include/header.php" ?>
<?php
// Initialiser la session
//session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
//if (!isset($_SESSION["username"])) {
//	header("Location: auth/login.php");
//	exit();
//}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="auth/style.css" />
</head>
<body>
	<div class="sucess">
		<br />
		<p>Statistiques</p>
	</div>
	<center>
		<br />
		<br /><br />
		<div class="row">
			<div class="col-sm-6">
				<h5>Stats Wifi</h5>
				<div class=container>
					<?php
					$lesENT = getLesEntreprises($bdd);?>
					<center>Veuillez choisir une entreprise : </center>
					<form class="d-flex" action="backoffice.php" method="get">
						<select name="ENT" class="form-select">
							<?php
							foreach ($lesENT as $uneENT) { ?>
								<option><?php
										echo $uneENT['ENT_NOM']; ?>
								</option>
							<?php } ?>
							<input class="btn btn-primary" type="submit" value="Valider">
						</select>
					</form>
					<?php
					if (isset($_GET['ENT'])) {
						$from = $_GET['ENT'];
						$nbDemandesWifi = count(getLesDemandesWifi($bdd, $from));
					} else {
						echo "<br> ⚠️ - Veuillez choisir une entreprise";
					} ?>
					<div class="jumbotron">
						<div class="container">
							<section>
								<?php
								if (isset($_GET['ENT'])) {
								?>
									<h1>Jusqu'à maintenant, <?php echo $nbDemandesWifi; ?> salariés ont généré un accès WiFi</h1>
									<table class="table">
										<thead>
											<tr>
												<th>ID Devis</th>
												<th>Date</th>
												<th>Montant</th>
											</tr>
										</thead>
										<!--<?php
											foreach ($LesDevis as $unDevis) {
											?>
                        <tr>
                            <td><?php echo $unDevis['iddevis'] ?></td>  
                            <td><?php echo $unDevis['datedev'] ?></td>
                            <td><?php echo $unDevis['montantttc'] ?></td>
                        </tr>
                    <?php } ?>-->
									</table>
								<?php } ?>
						</div>
					</div>

				</div>
			</div>

			<div class="col-sm-6">
				<h5>Stats Demandes Ressources</h5>
				<div class="container">
					<?php $lesRessources = getLesRessources($bdd); ?>
					<center>Veuillez choisir une ressource : </center>
					<form class="d-flex" action="backoffice.php" method="get">
						<select name="ressource" class="form-select">
							<?php
							foreach ($lesRessources as $uneRessource) { ?>
								<option><?php
										echo $uneRessource['LIBELLE_RESSOURCE']; ?>
								</option>
							<?php } ?>
							<input class="btn btn-primary" type="submit" value="Valider">
						</select>
					</form>
					<?php
					if (isset($_GET['ressource'])) {
						$from = $_GET['ressource'];
						$nbDemandesRessource = count(getLesDemandesRessource($bdd, $from));
					} else {
						echo "<br> ⚠️ - Veuillez choisir une ressource";
					} ?>
					<div class="jumbotron">
						<div class="container">
							<section>
								<?php
								if (isset($_GET['ressource'])) {
								?>
									<h1>Nombre de demandes pour "<?php echo $from; ?>"" : <?php echo $nbDemandesRessource; ?></h1>
									<table class="table">
										<thead>
											<tr>
												<th>ID Devis</th>
												<th>Date</th>
												<th>Montant</th>
											</tr>
										</thead>
										<!--<?php
											foreach ($LesDevis as $unDevis) {
											?>
						<tr>
							<td><?php echo $unDevis['iddevis'] ?></td>  
							<td><?php echo $unDevis['datedev'] ?></td>
							<td><?php echo $unDevis['montantttc'] ?></td>
						</tr>
					<?php } ?>-->
									</table>
								<?php } ?>
						</div>
					</div><br />
				</div>
			</div>
		</div>
		</div>
		<?php include "include/footer.php" ?>
</body>

</html>