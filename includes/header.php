<!-- Vérifie si connecté. -->
<?php 
    if (isset($_SESSION["courriel"]) || isset($_SESSION["idUser"])) {
        include("headerMembre.php");
        
    }
    else {
        include("header-non-connecte.php");
    }
?>
            
