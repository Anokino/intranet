<?php include "include/nav_portail.php" ?>
<?php
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
if (!isset($_SESSION["username"])) {
	header("Location: auth/login.php");
	exit();
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="auth/style.css" />
</head>

<body>
	<div class="sucess">
		<br />
		<h1>Bienvenue sur le portail du Syndic <?php echo $_SESSION['username']; ?>!</h1>
		<br />
		<p>Veuillez choisir une application</p>

	</div>
</body>

</html>
<center>
	<br />
	<br /><br />
	<div class="row">
		<div class="col-sm-6">
			<div class="card" style="width:400px">
				<img class="card-img-top" src="img\SyndicPro-logos.osm\SyndicPro-logos.jpeg" alt="Card image">
				<div class="card-body">
					<h4 class="card-title">Syndic-Pro</h4>
					<p class="card-text">Pour tout gérer avant l'assemblée</p>
					<a href="syndicpro/index_pro.php" class="btn btn-primary">Sélectionner</a>
				</div>
			</div>
		</div>

		<div class="col-sm-6">
			<div class="card" style="width:400px">
				<img class="card-img-top" src="img\easycop-logos.osm\easycop-logos.jpeg" alt="Card image">
				<div class="card-body">
					<h4 class="card-title">EasyCop</h4>
					<p class="card-text">La gestion de la copropriété, réinventée</p>
					<a href="easycop/index_co.php" class="btn btn-primary">Sélectionner</a>
				</div>
			</div>
		</div>

	</div><br /><br /><br />
	<a href="auth/logout.php">Déconnexion</a>
	<?php include "include/footer.php" ?>