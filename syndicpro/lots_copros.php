<?php include "include/nav.php" ?>
<div class=container>
  <?php
  $lescopros = getLesCoproprietes($bdd); ?>
  <center>Veuillez choisir une copropriété : </center>
  <form class="d-flex" action="lots_copros.php" method="get">
  <select name="copro" class="form-select">
    <?php
    foreach ($lescopros as $unecopro) { ?>
      <option><?php
              echo $unecopro['nomimmeuble'];
              ?>
      </option>
    <?php }?>
    <input class="btn btn-primary"type="submit" value="Valider">
  </select>
  </form>
  <?php
  if (isset($_GET['copro'])) {
    $from = $_GET['copro'];
    $LesLots = getLesLotsCopros($bdd, $from);
    $nbLots = count($LesLots);
  } else {
    echo "<br> ⚠️ - Veuillez choisir une copropriété";
  }?>
  <div class="jumbotron">
    <div class="container">
      <section>
      <?php 
      if (isset($_GET['copro'])) {?>
      <h1>Liste des <?php echo $nbLots; ?> lots de la copropriété : <?php echo $from; ?></h1>
        <table class="table">
          <thead>
            <tr>
              <th>ID Lot</th>
              <th>Localisation</th>
              <th>Tantième</th>
              <th>Adresse</th>
            </tr>
          </thead>
          <?php
          foreach ($LesLots as $unLot) {
            ?>
            <tr>
              <td><?php echo $unLot['idlot'] ?></td>
              <td><?php echo $unLot['localisation'] ?></td>
              <td><?php echo $unLot['tantieme'] ?></td>
              <td><?php echo $unLot['rue'], ' - ', $unLot['ville'], ' - ', $unLot['cp']  ?></td>
            </tr>
            
          <?php } ?>
        </table>
        <?php }?>
    </div>
  </div>
<?php include "include/footer.php" ?>