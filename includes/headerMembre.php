<?php 
    $user = $_SESSION["courriel"];
    $nom= strtok($user,"@")
?>
<a class="nav-link text-white" href="logout.php">Bonjour <?php echo $nom?> Logout</a>
          
