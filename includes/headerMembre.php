<?php 
    $user = $_SESSION["courriel"];
    $idSession = $_SESSION["idUser"];
    $nom= strtok($user,"@");
?>
<a class="nav-link text-white" href="logout.php">Bonjour <?php echo $nom, $idSession ?> Logout</a>
          
