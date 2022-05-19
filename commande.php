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
				<div class=container>
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