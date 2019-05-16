<?php

    include("../bd/connexion.php");
    session_start();
    global $connexion;
    $idAnnonce = $_SESSION['idAnnonce'];
    $reqAnnonce = "SELECT idDemandeur FROM annonce WHERE `idAnnonce` = '$idAnnonce'";
    foreach($connexion->query($reqAnnonce) as $rowA)
    $idDemandeur = $rowA['idDemandeur'];

    $reqAnnonce = "SELECT idDemandeur FROM annonce WHERE `idAnnonce` = '$idAnnonce'";
    foreach($connexion->query($reqAnnonce) as $rowA)
    $idDemandeur = $rowA['idDemandeur'];

    $reqDemandeur = "SELECT idUser FROM connexion WHERE `courriel` = '$livreur'";
    foreach($connexion->query($reqDemandeur) as $rowL)
    $idLivreur = $rowL['idUser'];

    $livreur = $_SESSION['courriel'];
    $message = htmlspecialchars(trim($_POST['message']));

    $reqLastId = "SELECT MAX(id) AS max FROM messages WHERE `idAnnonce` = '$idAnnonce'";
    foreach($connexion->query($reqLastId) as $rowM)
    $last_id = $rowM['max'];

    $reqDemandeur = "SELECT livreur FROM messages WHERE `idAnnonce` = '$idAnnonce' AND `demandeur` = '$livreur' AND `id` = '$last_id'";
    foreach($connexion->query($reqDemandeur) as $rowM)
    $demandeur = $rowM['livreur'];

        // if($demandeur==$livreur){
            // $reqDemandeur = "SELECT courriel FROM connexion WHERE `idUser` = '$idDemandeur'";
            // foreach($connexion->query($reqDemandeur) as $row)
            // $demandeur = $row['courriel'];
        // }

    $requete="INSERT INTO messages VALUES(0,?,?,?,?,NOW())";
	$stmt = $connexion->prepare($requete);
    $stmt->execute(array($livreur,$demandeur,$idAnnonce,$message));
 ?>   