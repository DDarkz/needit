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

    $req = $connexion->query("SELECT * FROM messages WHERE 
       (livreur='$livreur' AND demandeur='$demandeur' AND idAnnonce = '$idAnnonce') 
    OR (demandeur='$livreur' AND livreur='$demandeur'AND idAnnonce = '$idAnnonce') 
    OR (livreur='$demandeur' AND demandeur='$demandeur'AND idAnnonce = '$idAnnonce')
    OR (idAnnonce = '$idAnnonce')");
    $results = array();

    while($rows = $req->fetchObject()){
        $results[] = $rows;
    }

    foreach($results as $message){
        ?>
            <div class="message <?php echo ($message->livreur == $livreur) ? 'message-Livreur' : 'message-demandeur' ?>">
                <?= $message->message ?>

            </div>
            <br/><br/>

        <?php
    }