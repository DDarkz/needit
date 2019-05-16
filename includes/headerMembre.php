<?php 
    $user = $_SESSION["courriel"];
    $idSession = $_SESSION["idUser"];
    $nom= strtok($user,"@");
?>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bonjour <?php echo $nom?></a>
<div class="dropdown-menu">
    <a class="dropdown-item" href="formulaireDemandeur.php">Créer une annonce</a>
    <a class="dropdown-item" href="profilUtilisateurAnnonces.php">Mes annonces</a>
    <a class="dropdown-item" href="profilUtilisateur.php">Profil</a>
    <a class="dropdown-item" href="logout.php">Se déconnecter</a>
</div>
</li>