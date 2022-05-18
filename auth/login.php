<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css" />
	<?php include("../include/nav_portail.php");
	$bdd = seConnecter(); ?>
</head>

<body>

	<div id="container">
		<!-- zone de connexion -->

		<form class="box" action="verif.php" method="POST" name="login">
			<h1 class="box-logo box-title">
				<Syndic</h1>
					<h1 class="box-title">Connexion</h1>
					<input class="form-control box-input" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
					<input class="form-control box-input" type="password" placeholder="Entrer le mot de passe" name="password" required>
					<div class="d-grid">
						<input id="submit" type="submit" value="Connexion" name="submit" class="btn btn-primary btn-lg box-button">
					</div><br />
					<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
					<?php
					if (isset($_GET['erreur'])) {?>
<div class="alert alert-danger alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>⚠️ - 
					<?php
						$err = $_GET['erreur'];
						if ($err == 1)
							echo "Utilisateur ou mot de passe incorrect";
						else if ($err == 2)
							echo "Veuillez remplir tous les champs";
					}?></div>
		</form>
	</div>
</body>
</html>