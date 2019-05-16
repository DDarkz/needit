<?php 
    $user = $_SESSION["courriel"];
    $idSession = $_SESSION["idUser"];
    $nom= strtok($user,"@");
?>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Bonjour <?php echo $nom?></a>
<div class="dropdown-menu">
    <a class="dropdown-item" href="formulaireDemandeur.php">Créer annonce</a>
    <a class="dropdown-item" href="profilUtilisateurAnnonces.php">Mes annonces</a>
    <a class="dropdown-item" href="profilUtilisateurAnnonces.php">Mes messages</a>
    <a class="dropdown-item" href="profilUtilisateur.php">Profil</a>
</div>
</li>

<li class="nav-item">
<a class="nav-link" href="logout.php">Se déconnecter</a>
</li>

          
