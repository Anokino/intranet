<?php
function seConnecter()
{
   $serveur = 'mysql:host=localhost;port=3307';
   $bdd = 'dbname=Hotel';
   $user = 'root';
   $mdp = '';
   try {
      $pdo = new PDO($serveur . ';' . $bdd . ';charset=UTF8', $user, $mdp);
   } catch (PDOException $e) {
      echo ('Erreur : ' . $e->getMessage());
   }
   return $pdo;
};

  
function getLesSIRET($bdd)
{
   $req = "SELECT ENT_SIRET FROM `entreprise`";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesEntreprises($bdd)
{
   $req = "SELECT * FROM `entreprise`";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesRessources($bdd)
{
   $req = "SELECT * FROM `ressource`";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesDemandesWifi($bdd)
{
   $req = "SELECT WIFI_ID FROM `client`";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesCoproprietaires($bdd)
{
   $req = "SELECT * FROM `coproprietaire` INNER JOIN lot ON coproprietaire.idcoproprietaire = lot.idcoproprietaire INNER JOIN copropriete ON lot.idcopropriete = copropriete.idcopropriete";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesCoproprietairesFrom($bdd, $from)
{
   $req = "SELECT * FROM `coproprietaire` INNER JOIN lot ON coproprietaire.idcoproprietaire = lot.idcoproprietaire INNER JOIN copropriete ON lot.idcopropriete = copropriete.idcopropriete WHERE copropriete.nomimmeuble = '$from'";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesLotsCopros($bdd, $from)
{
   $req = "SELECT * FROM `lot` INNER JOIN copropriete ON lot.idcopropriete = copropriete.idcopropriete WHERE copropriete.nomimmeuble = '$from'";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesLotsCoproprietaires($bdd, $nom, $prenom)
{
   $req = "SELECT * FROM `lot` INNER JOIN coproprietaire ON lot.idcoproprietaire = coproprietaire.idcoproprietaire WHERE coproprietaire.nom ='".$nom. "'" ." AND coproprietaire.prenom = '" .$prenom."'";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesDevis($bdd)
{
   $req = "SELECT * FROM `devis`";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function getLesDevisCopros($bdd, $from)
{
   $req = "SELECT * FROM `devis` INNER JOIN copropriete ON devis.idcopropriete = copropriete.idcopropriete WHERE copropriete.nomimmeuble = '$from'";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};

function setDevis($bdd, $date, $montant, $travaux, $presta, $copro)
{
   $req = "INSERT INTO `devis` (`iddevis`, `date`, `montant`, `travaux`, `presta`, `idcopropriete`) VALUES (NULL, '$date', '$montant', '$travaux', '$presta', '$copro')";
   $res = $bdd->query($req);
};