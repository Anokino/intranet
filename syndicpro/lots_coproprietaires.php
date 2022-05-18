<?php include "include/nav.php" ?>
<div class=container>
  <?php
  $lescoproprietaires = getLesCoproprietaires($bdd); ?>
  <center>Veuillez choisir un copropriétaire : </center>
  <form class="d-flex" action="lots_coproprietaires.php" method="get">
  <select name="coproprietaire" class="form-select">
    <?php
    foreach ($lescoproprietaires as $uncopropri) { ?>
      <option><?php
              echo $uncopropri['nom']. ' '.$uncopropri['prenom'];?>
      </option>
    <?php }?>
    <input class="btn btn-primary"type="submit" value="Valider">
  </select>
  </form>
  <?php
  if(isset ($_GET['coproprietaire'])) {
    $from = $_GET['coproprietaire'];
    $pos= strpos($from, ' ');
    $nom = substr($from,0, $pos);
    $prenom = substr($from, $pos+1, strlen($from)-$pos);

    $LesLots = getLesLotsCoproprietaires($bdd, $nom, $prenom);
    $nbLots = count($LesLots);
  } else {
    echo "<br> ⚠️ - Veuillez choisir un copropriétaire";
  }?>
  <div class="jumbotron">
    <div class="container">
      <section>
      <?php if (isset($_GET['coproprietaire'])) {?>
      <h1>Liste des <?php echo $nbLots?> Lots</h1>
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