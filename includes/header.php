<!-- Vérifie si connecté. -->
<?php 
    if (isset($_SESSION["courriel"])) {
        include("headerMembre.php");
        
    }
    else {
        include("header-non-connecte.php");
    }
?>
            
