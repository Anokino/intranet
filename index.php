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
	<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
	<link rel="stylesheet" href="css/daterange.css" />
	<script>
		function nvClient() {
			var div = document.getElementById("maDIV");
			if (div.style.display === "none") {
				div.style.display = "block";
			} else {
				div.style.display = "none";
			}
		}
	</script>
</head>

<body>
	<div class="sucess">

		<h3>Bienvenue sur l'Intranet - Hôtel Rabanov
			<!--<?php echo $_SESSION['username']; ?>-->!
		</h3>

	</div>
	<center>
		<br />
		<br /><br/>
		<div class="row">
			<div class="row">
				<form method="post" action="index.php">
			</div>
			<div class="col-sm-6">
				<div class="card" style="width:80%">
					<img class="card-img-top" src="img\SyndicPro-logos.osm\SyndicPro-logos.jpeg" alt="Card image">
					<div class="card-body">
						<h4 class="card-title">Informations du séjour</h4><br />
						<p class="card-text">
						<div class="form-group">
							<label for="exampleFormControlInput1">SIRET de votre entreprise</label>
							<?php
							$lesSIRET = getLesSIRET($bdd); ?>
							<form action="index.php" method="get">
								<div id="siret">
									<select name="ENT" class="form-select">
										<?php
										foreach ($lesSIRET as $unSIRET) { ?>
											<option><?php
													echo $unSIRET['ENT_SIRET']; ?>
											</option>
										<?php } ?>
										<button class="btn btn-primary" type="submit">AAAAAAAAAAAA<i class="bi bi-check-lg"></i></button>
									</select>
								</div>
							</form>
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Nom du client</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nom du client" name="nom_client">
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Prénom du client</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Prénom du client" name="prenom_client">
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Adresse du client</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Adresse du client" name="adresse_client">
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Ville du client</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Ville du client" name="ville_client">
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Code postal du client</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Code postal du client" name="cp_client">
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Téléphone du client</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Téléphone du client" name="tel_client">
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Email du client</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Email du client" name="email_client">
						</div><br />
						Date du séjour :
						<input class="form-control" type="text" name="daterange" placeholder="Sélectionnez une date" value="" />
						<script>
							$(function() {
								$('input[name="daterange"]').daterangepicker({
									opens: 'center',
									showDropdowns: true,
								}, function(start, end, label) {
									console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
								});
							});
						</script><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Date de début du séjour</label>
							<input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Date de début du séjour" name="date_debut">
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">Date de fin du séjour</label>
							<input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Date de fin du séjour" name="date_fin">
						</div><br />
						<div class="form-group">
							<label for="exampleFormControlInput1">N° de Carte bancaire :</label>
							<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="N° de Carte bancaire" name="carte_bancaire">
						</div><br />
						</p>
						<div id="boutonsForm" style="display:flex;justify-content: space-around;flex-direction: row-reverse;align-items: center;">
							<div id="boutonValider">
								<button name='btnSubmit' type="submit" class="btn btn-primary">Valider</button>
								<?php if (isset($_POST['btnSubmit']) && ($_POST['date'])) { ?>
									<br /><br />
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="btn-close" data-bs-dismiss="alert"></button>✅ -
										Devis du <?php echo $_POST['date'] ?> ajouté avec succès !
									</div>
								<?php setDevis($bdd, $_POST['date'], $_POST['montant'], $_POST['travaux'], $_POST['presta'], $_POST['copro']);
								} ?>
							</div>
							<div id="boutonNvClient">
								<button name='btnSubmit' type="submit" class="btn btn-primary">Nouveau client</button>
								<?php if (isset($_POST['btnSubmit']) && ($_POST['date'])) { ?>
									<br /><br />
									<div class="alert alert-success alert-dismissible">
										<button type="button" class="btn-close" data-bs-dismiss="alert"></button>✅ -
										Devis du <?php echo $_POST['date'] ?> ajouté avec succès !
									</div>
								<?php setDevis($bdd, $_POST['date'], $_POST['montant'], $_POST['travaux'], $_POST['presta'], $_POST['copro']);
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="card" style="width:80%">
					<img class="card-img-top" src="img\easycop-logos.osm\easycop-logos.jpeg" alt="Card image">
					<div class="card-body">
						<h4 class="card-title">Ressources</h4>
						<p class="card-text">
						<div class="container" style="max-width:450px">
							<div>Salle | Quantité : <output id="rangePrimary">0</output>
								<div class="range range-primary">
									<input class="form-range" type="range" name="range" min="0" max="10" value="0" onchange="rangePrimary.value=value">
								</div>
								</label>
							</div><br />

							<div>Vidéo Projecteur | Quantité : <output id="rangeSecondary">0</output>
								<div class="range range-primary">
									<input class="form-range" type="range" name="range" min="0" max="10" value="0" onchange="rangeSecondary.value=value">
								</div>
								</label>
							</div><br />
							<div>Imprimante | Quantité : <output id="rangeTrimary">0</output>
								<div class="range range-primary">
									<input class="form-range" type="range" name="range" min="0" max="10" value="0" onchange="rangeTrimary.value=value">
								</div>
								</label>
							</div><br />
							<div>Tablette | Quantité : <output id="rangeQrimary">0</output>
								<div class="range range-primary">
									<input class="form-range" type="range" name="range" min="0" max="10" value="0" onchange="rangeQrimary.value=value">
								</div>
								</label>
							</div>
						</div>
					</div>
					<a href="back/backoffice.php" class="btn btn-primary">Sélectionner</a>
				</div>
				<div class="card" style="width:80%">
					<img class="card-img-top" src="img\easycop-logos.osm\easycop-logos.jpeg" alt="Card image">
					<div class="card-body">
						<h4 class="card-title">Wifi ou pdf ou dans commande</h4><br/>
						<p class="card-text">Page login ? Deux pages pour nv et déja client ?</p>
				</div>
						
			</div>
		</div>
		</form>
		</div><br />
		<?php include "include/footer.php" ?>
</body>

</html>