<!DOCTYPE html>
<html>
<head>
    <title>Syndic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <?php include ("include/bdd.php"); $bdd=seConnecter(); ?>
    <!-- MDB icon -->
    <link rel="icon" href="../img/favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    />
    <!-- Google Fonts Roboto -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"
    />
    <!-- MDB -->
    <link rel="stylesheet" href="../css/mdb.min.css" />
  </head>

<body>
<?php
    // Initialiser la session
    session_start();
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    if (!isset($_SESSION["username"])) {
        header("Location: ../auth/login.php");
        exit();
    }
    ?>
<header>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="index_co.php">EasyCop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="devis.php">Mes Devis</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Lots</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="lots_copros.php">Liste des lots par copropriété</a></li>
                                <li><a class="dropdown-item" href="lots_coproprietaires.php">Liste des lots par copropriétaire</a></li>
                            </ul>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Devis</a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="devis.php">Liste des devis</a></li>
                                    <li><a class="dropdown-item" href="add_devis.php">Enregistrement d'un devis</a></li>
                                    <li><a class="dropdown-item" href="#">Calcul appels de fond</a></li>
                                </ul>
                            </li>
                    </ul>
                    <div class="dropdown">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">
                        <?php echo $_SESSION['username']; ?>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../index.php">Accueil</a></li>
                        <li><a class="dropdown-item" href="../auth/logout.php">Déconnexion</a></li>
                    </div>
            </div>
        </nav>
</header><br/>