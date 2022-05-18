<?php include "include/nav.php" ?>
<div class=container>
  <?php
  $lescopros = getLesCoproprietes($bdd); ?>
  <center>Veuillez choisir une copropriété : </center>
  <form class="d-flex" action="copro.php" method="get">
    <select name="copro" class="form-select">
      <?php
      foreach ($lescopros as $unecopro) { ?>
        <option>
          <?php
          echo $unecopro['nomimmeuble'];
          ?>
        </option>
      <?php } ?>
      <input class="btn btn-primary" type="submit" value="Valider">
    </select>
  </form>
  <?php
  if (isset($_GET['copro'])) {
    $from = $_GET['copro'];
    $LesCoproprietaires = getLesCoproprietairesFrom($bdd, $from);
    $nbCoproprietaires = count($LesCoproprietaires);
  } else {
    echo "<br> ⚠️ - Veuillez choisir une copropriété";
  }
  ?>
  <div class="jumbotron">
    <div class="container">
      <section>
        <h1><?php if (isset($_GET['copro'])) {
              echo "Liste des " . $nbCoproprietaires; ?> copropriétaires de la <?php echo $from; ?></h1>
        <table class="table">
          <thead>
            <tr>
              <th>Prénom</th>
              <th>Nom</th>
              <th>Civilité</th>
              <th>Téléphone</th>
              <th>Adresse</th>
            </tr>
          </thead>
          <?php
              foreach ($LesCoproprietaires as $unCoproprietaire) {
          ?>
            <tr>
              <td><?php echo $unCoproprietaire['prenom'] ?></td>
              <td><?php echo $unCoproprietaire['nom'] ?></td>
              <td><?php echo $unCoproprietaire['civilite'] ?></td>
              <td><?php echo $unCoproprietaire['tel'] ?></td>
              <td><?php echo $unCoproprietaire['rue'], ' - ', $unCoproprietaire['ville'], ' - ', $unCoproprietaire['cp']  ?></td>
            </tr>
            
        <?php }
            } ?>
        </table>
    </div>
  </div>
  <?php include "include/footer.php" ?>
  