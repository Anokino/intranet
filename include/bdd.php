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

function getClient($bdd, $CL_ID)
{
   $req = "SELECT * FROM `client` WHERE `CL_ID` = '$CL_ID'";
   $res = $bdd->query($req);
   $lesLignes = $res->fetchAll();
   return $lesLignes;
};
//Fonctions Diverses


function updateClient($bdd, $CL_ID, $ENT_SIRET, $CL_NOM, $CL_PRENOM, $CL_EMAIL, $CL_TEL, $CL_CB)
{
   //créer un identifiant aléatoire de 6 chiffres et deux lettres
   $req = "UPDATE client
   SET `ENT_SIRET` = '$ENT_SIRET',`CL_NOM` = '$CL_NOM', `CL_PRENOM` = '$CL_PRENOM', `CL_EMAIL` = '$CL_EMAIL', `CL_TEL` = '$CL_TEL', `CL_CB` ='$CL_CB'
   WHERE `CL_ID` = $CL_ID";
   echo $req;
   $res = $bdd->exec($req);
   return $res; 
};

//Fonctions SET


function setnvClient($bdd, $ENT_SIRET, $CL_NOM, $CL_PRENOM, $CL_EMAIL, $CL_TEL, $CL_CB)
{
   //créer un identifiant aléatoire de 6 chiffres et deux lettres
   $id = rand(100000, 999999) . chr(rand(65, 90)) . chr(rand(65, 90));
   $req = "INSERT INTO `client` (`CL_ID`, `ENT_SIRET`, `CL_NOM`, `CL_PRENOM`, `CL_EMAIL`, `CL_TEL`, `CL_CB`) VALUES ('$id', '$ENT_SIRET', '$CL_NOM', '$CL_PRENOM', '$CL_EMAIL', '$CL_TEL', '$CL_CB')";
   echo $req;
   $res = $bdd->exec($req);
   return $res; 
};

function setDevis($bdd, $date, $montant, $travaux, $presta, $copro)
{
   $req = "INSERT INTO `devis` (`iddevis`, `date`, `montant`, `travaux`, `presta`, `idcopropriete`) VALUES (NULL, '$date', '$montant', '$travaux', '$presta', '$copro')";
   $res = $bdd->query($req);
};