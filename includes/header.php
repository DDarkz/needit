<!-- Vérifie si connecté. -->
<?php 
    if (isset($_SESSION["username"])) {
        include("headerMembre.php");
        
    }
    else {
        include("header-non-connecte.php");
    }
?>
            
