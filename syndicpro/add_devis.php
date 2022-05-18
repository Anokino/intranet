<?php include "include/nav.php"?>

<div class=container>
<?php $nbDevis = count(getLesDevis($bdd)) ?>
<div class="jumbotron">
    <center>
      <div class="container">
        <section>
          <h1><br>Ajouter un devis à les liste des <?php
            echo $nbDevis;?> devis</h1>
          <div class="row">

            <form  method="post" action="add_devis.php">
              Date du devis :
              <input type="date" class="form-control" name='date'required>
            </div>
              <br>
              Montant :
              <input class="form-control" name='montant'required>
              
              <br>
              Travaux :
              <input class="form-control" name='travaux'required>
              <br>
              Prestataire :
              <input class="form-control" name='presta'required>
              <br>
              Copropriété :
              <input class="form-control" name='copro'required>
              <br>
              <button name='btnSubmit' type="submit" class="card-link btn btn-primary">Valider</button>
              <?php if (isset($_POST['btnSubmit']) && ($_POST['date'])) { ?>
                <br/><br/><div class="alert alert-success alert-dismissible">
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>✅ - 
                  Devis du <?php echo $_POST['date'] ?> ajouté avec succès !
                </div>
              <?php setDevis($bdd, $_POST['date'], $_POST['montant'], $_POST['travaux'], $_POST['presta'], $_POST['copro']); } ?>
            </form>
          </div>
        </section>
      </div>
  </div>
