<?php include "include/nav.php" ?>
<div class=container>
    <?php
    $lescopros = getLesCoproprietes($bdd); ?>
    <center>Veuillez choisir une copropriété : </center>
    <form class="d-flex" action="devis.php" method="get">
    <select name="copro" class="form-select">
        <?php
        foreach ($lescopros as $unecopro) { ?>
            <option><?php
                    echo $unecopro['nomimmeuble'];
                    ?>
            </option>
        <?php }?>
        <input class="btn btn-primary" type="submit" value="Valider">
    </select>
    </form>
    <?php
    if (isset($_GET['copro'])) {
        $from = $_GET['copro'];
        $LesDevis = getLesDevisCopros($bdd, $from);
        $nbDevis = count($LesDevis);
    } else {
        echo "<br> ⚠️ - Veuillez choisir une copropriété";
    }?>
    <div class="jumbotron">
        <div class="container">
            <section>
            <?php
            if (isset($_GET['copro'])) {
                ?>
                <h1>Liste des <?php echo $nbDevis; ?> devis de la copropriété : <?php echo $from; ?></h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Devis</th>
                            <th>Date</th>
                            <th>Montant</th>
                        </tr>
                    </thead>
                    <?php
                    foreach ($LesDevis as $unDevis) {
                        ?>
                        <tr>
                            <td><?php echo $unDevis['iddevis'] ?></td>  
                            <td><?php echo $unDevis['datedev'] ?></td>
                            <td><?php echo $unDevis['montantttc'] ?></td>
                        </tr>
                        
                    <?php } ?>
                </table>
                <?php }?>
        </div>
    </div>
<?php include "include/footer.php" ?>
</div>
</html>


        