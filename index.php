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
		<br /><br />
		<div class="row">
			<div class="col-sm-6">
				<div class="card" style="width:80%">
					<img class="card-img-top" src="img\SyndicPro-logos.osm\SyndicPro-logos.jpeg" alt="Card image">
					<div class="card-body">
						<form method="post" name="nvclient" action="index.php">
							<h4 class="card-title">Nouveau client ?</h4>
							<hr />
							<p class="card-text">
							<div class="form-group">
								<label for="ENT_SIRET">SIRET :</label>
								<input type="text" class="form-control" id="ENT_SIRET" placeholder="SIRET de l'entreprise" name="ENT_SIRET">
							</div><br />
							<div class="form-group">
								<label for="nom_client">Nom du client: </label>
								<input type="text" class="form-control" id="nom_client" placeholder="Nom du client" name="nom_client">
							</div><br />
							<div class="form-group">
								<label for="prenom_client">Prénom du client :</label>
								<input type="text" class="form-control" id="prenom_client" placeholder="Prénom du client" name="prenom_client">
							</div><br />
							<div class="form-group">
								<label for="tel_client">Téléphone du client :</label>
								<input type="text" class="form-control" id="tel_client" placeholder="Téléphone du client" name="tel_client">
							</div><br />
							<div class="form-group">
								<label for="email_client">Email du client :</label>
								<input type="text" class="form-control" id="email_client" placeholder="Email du client" name="email_client">
							</div><br />
							<!--<div class="form-group">
								<label for="exampleFormControlInput1">Date de début du séjour</label>
								<input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Date de début du séjour" name="date_debut">
							</div><br />
							<div class="form-group">
								<label for="exampleFormControlInput1">Date de fin du séjour</label>
								<input type="date" class="form-control" id="exampleFormControlInput1" placeholder="Date de fin du séjour" name="date_fin">
							</div><br />-->
							<div class="form-group">
								<label for="carte_bancaire">N° de Carte bancaire :</label>
								<input type="text" class="form-control" id="carte_bancaire" placeholder="N° de Carte bancaire" name="carte_bancaire">
							</div><br />
							Dates du séjour :
							<input class="form-control" type="text" name="daterange" placeholder="Sélectionnez une date" value="" />
							<input id="start" name="start">
							<script>
								$(function() {
									$('input[name="daterange"]').daterangepicker({
										opens: 'center',
										showDropdowns: true,
									}, function(start, end, label) {
										document.nvClient.start.value = start.format('YYYY-MM-DD');
										console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
									});
								});
							</script>
							</p>
							<div id="boutonsForm" style="display:flex;justify-content: space-around;flex-direction: row-reverse;align-items: center;">
								<div id="boutonNvClient">
									<button name='btnCreernvclient' type="submit" class="btn btn-primary">Créer mon compte</button>
									<?php if (isset($_POST['btnCreernvclient'])) { ?>
										<br /><br />
										<div class="alert alert-success alert-dismissible">
											<button type="button" class="btn-close" data-bs-dismiss="alert"></button>✅ -
											Votre compte a été créé avec succès !
										</div><?php
												echo $_POST['start'];
												setnvClient(
													$bdd,
													$_POST['ENT_SIRET'],
													$_POST['nom_client'],
													$_POST['prenom_client'],
													$_POST['email_client'],
													$_POST['tel_client'],
													$_POST['carte_bancaire'], //$_POST['daterange']
												); ?>
									<?php } ?>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="col-sm-6">
				<div class="card" style="width:80%">
					<img class="card-img-top" src="img\SyndicPro-logos.osm\SyndicPro-logos.jpeg" alt="Card image">
					<div class="card-body">
						<form method="post" action="index.php">
							<h4 class="card-title">Déjà Client :</h4>
							<hr />
							<p class="card-text">
							<div class="form-group">
								<label for="exampleFormControlInput1">Identifiant</label>
								<div id="formID">
									<div id="boutonsForm" style="display:flex;">
										<input type="text" class="form-control" id="CL_ID" placeholder="Votre Identifiant" name="CL_ID" required>
										<button name='btnID' type="submit" class="btn btn-primary" style="margin-left: 5px;">Valider</button>
										<?php if (isset($_POST['btnID'])) { ?>
											<?php $client = getClient($bdd, $_POST['CL_ID']);
											foreach ($client as $unclient) {
											} ?>
										<?php } ?>
									</div>
								</div>
								</p>
							</div>

						</form>
						<?php if (isset($_POST['CL_ID'])) { ?>
							<form method="post" action="index.php">
								<p class="card-text">
								<div class="form-group">
									<label for="ENT_SIRET">SIRET</label>
									<input type="text" class="form-control" id="ENT_SIRET" placeholder="SIRET de l'entreprise" name="ENT_SIRET" value=<?php echo $unclient['ENT_SIRET'] ?>>
								</div><br />
								<div class="form-group">
									<label for="CL_NOM">Nom du client</label>
									<input type="text" class="form-control" id="CL_NOM" placeholder="Nom du client" name="nom_client" value=<?php echo $unclient['CL_NOM'] ?>>
								</div><br />
								<div class="form-group">
									<label for="CL_PRENOM">Prénom du client</label>
									<input type="text" class="form-control" id="CL_PRENOM" placeholder="Prénom du client" name="prenom_client" value=<?php echo $unclient['CL_PRENOM'] ?>>
								</div><br />
								<div class="form-group">
									<label for="CL_TEL">Téléphone du client</label>
									<input type="text" class="form-control" id="CL_TEL" placeholder="Téléphone du client" name="tel_client" value=<?php echo $unclient['CL_TEL'] ?>>
								</div><br />
								<div class="form-group">
									<label for="CL_EMAIL">Email du client</label>
									<input type="text" class="form-control" id="CL_EMAIL" placeholder="Email du client" name="email_client" value=<?php echo $unclient['CL_EMAIL'] ?>>
								</div><br />
								<div class="form-group">
									<label for="CL_CB">N° de carte bancaire</label>
									<input type="text" class="form-control" id="CL_CB" placeholder="Carte Bancaire du client" name="carte_bancaire" value=<?php echo $unclient['CL_CB'] ?>>
								</div>
								<input type="text" style="visibility:hidden" id="CL_ID" placeholder="ID du client" name="CL_ID" value=<?php echo $unclient['CL_ID'] ?>>
								</p>
								<div id="boutonsForm" style="display:flex;">
									<button name='btnModif' type="submit" class="btn btn-primary" style="margin-left: 5px;">Modifer mes informations</button>
									<?php if (isset($_POST['btnModif'])) { ?>
										<?php updateClient(
											$bdd,
											$_POST['CL_ID'],
											$_POST['ENT_SIRET'],
											$_POST['nom_client'],
											$_POST['prenom_client'],
											$_POST['email_client'],
											$_POST['tel_client'],
											$_POST['carte_bancaire'], //$_POST['daterange']

										);
										unset($_POST['CL_ID']); ?>
									<?php } ?>
								</div>
							</form>
						<?php } ?>

					</div>
				</div>
			</div>
		</div>
		</div>




		</div>
		</form>
		</div>
		</div>
		<div class=" card" style="width:80%">
			<img class="card-img-top" src="img\easycop-logos.osm\easycop-logos.jpeg" alt="Card image">
			<div class="card-body">
				<h4 class="card-title">Réserver un séjour</h4><br />
				<form method="POST" action="index.php">
					<p class="card-text">
					<div class="form-group">
						<label for="CL_ID_Sejour">Identifiant</label>
						<input type="text" class="form-control" id="CL_ID_Sejour" placeholder="Identifiant du compte" name="CL_ID_Sejour">
					</div><br />
					Dates du séjour :
					<input class="form-control" type="text" name="daterange" id="daterange" placeholder="Sélectionnez une date"/>
					<script>
						$(function() {
							$('input[id="daterange"]').daterangepicker({
								opens: 'center',
								showDropdowns: true,
							}, function(start, end, label) {
								//
								console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
							});
						});
					</script>
					<input class="form-control" type="text" name="dateD" id="dateD"/>
					</p>
					<div id="boutonsForm" style="display:flex;justify-content: space-around;flex-direction: row-reverse;align-items: center;">
						<div id="boutonSejour">
							<button name='btnSejour' type="submit" class="btn btn-primary">Créer mon compte</button>
							<?php if (isset($_POST['btnSejour'])) { ?>
								<br /><br />
								<div class="alert alert-success alert-dismissible">
									<button type="button" class="btn-close" data-bs-dismiss="alert"></button>✅ -
									Votre compte a été créé avec succès !
								</div>
								<?php
										$date = $_POST['dateRange'];
										$dateTiret = str_replace("/", "-", $date);
										$dateDébut = explode("-", $dateTiret)[0];
										$dateFin = explode("-", $dateTiret)[1];
										echo $dateDébut;
										echo $dateFin;
										setSéjour(
											$bdd,
											$_POST['ENT_SIRET'],
											$_POST['nom_client'],
											$_POST['prenom_client'],
											$_POST['email_client'],
											$_POST['tel_client'],
											$_POST['carte_bancaire'], //$_POST['daterange']
										); ?>
							<?php } ?>
						</div>
					</div>
				</form>
				</p>
			</div>
		</div>
		</div>
		</div><br />
		<?php include "include/footer.php" ?>
</body>

</html>