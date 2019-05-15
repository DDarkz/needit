<?php 
    $user = $_SESSION["courriel"];
    $idSession = $_SESSION["idUser"];
    $nom= strtok($user,"@");
?>
<li class="nav-item">
<a class="nav-link text-white" href="profilUtilisateur.php">Bonjour <?php echo $nom?></a>
</li>
<li class="nav-item">
<a class="nav-link text-white" href="logout.php">Se déconnecter</a>
</li>

          
