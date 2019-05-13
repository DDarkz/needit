<?php

    include("../bd/connexion.php");
    session_start();
    global $connexion;
    $idAnnonce = $_SESSION['idAnnonce'];
    $reqAnnonce = "SELECT idDemandeur FROM annonce WHERE `idAnnonce` = '$idAnnonce'";
    foreach($connexion->query($reqAnnonce) as $rowA)
    $idDemandeur = $rowA['idDemandeur'];

    $reqDemandeur = "SELECT courriel FROM connexion WHERE `idUser` = '$idDemandeur'";
    foreach($connexion->query($reqDemandeur) as $row)
    $demandeur = $row['courriel'];
    $livreur = $_SESSION['courriel'];
    $message = htmlspecialchars(trim($_POST['message']));

    $requete="INSERT INTO messages VALUES(0,?,?,?,?,NOW())";
	$stmt = $connexion->prepare($requete);
    $stmt->execute(array($livreur,$demandeur,$idAnnonce,$message));
 ?>   