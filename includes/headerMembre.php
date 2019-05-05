<?php 
    $user = $_SESSION["courriel"];
    $idUser = $_SESSION["idUser"];
    $nom= strtok($user,"@");
?>
<a class="nav-link text-white" href="logout.php">Bonjour <?php echo $nom, $idUser ?> Logout</a>
          
