<?php
include("bd/connexion.php");
session_start();
if($_SESSION["courriel"] != "admin@gmail.com"){
  header("Location:annonces.php");
}

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin</title>

    <?php include("includes/header-script.php"); ?>
  </head>
  <!-- onload="requetes('actionListerMAdmin'), requetes('actionListerA');" -->
  <body id="page-top" onload="requetes(null,'actionListerMAdmin')">

    <?php include("includes/menu.php"); ?>
    
    <!-- debut section -->
    <section id="projects" class="projects-section bg-light">
    <!-- debut container -->
    <div class="container pt-5">
      <div id="alert">
        <div class="alert" role="alert"></div>
      </div>

       <h1>Administration des membres et annonces.</h1>
       <ul class="nav nav-pills">
        <li class="nav-item">
          <a class="nav-link active btn-info mr-2" id="lienMembres" href="#" onclick="requetes(null,'actionListerMAdmin')">Membres</a>
        </li>
        <li class="nav-item">
          <a class="nav-link btn-info" id="lienAnnonces" href="#" onclick="requetes(null,'actionListerA');">Annonces</a>
        </li>
      </ul>
       <form>
        <div id="loading"></div>
        <div id="contenu" class="mt-4">
           <!--?php listerMembres(); ?-->
           <!--?php listerAnnonces(); ?-->
        </div>
        <input type="hidden" id="idUser" name="idUser" value="">
        <input type="hidden" id="idAnnonce" name="idAnnonce" value="">
        </form>

    </div>
    <!-- fin container -->
  </section>
  <!-- fin section -->
   
    <script type="text/javascript">
				function listerId(elem,choixId) {
					var idUser = document.getElementById("idUser").value = choixId;
					(function(){
						requetes(elem,'actDeleteMembres');
					})();
        }
        
        function listerIdAnnonce(elem,choixId) {
					var idAnnonce = document.getElementById("idAnnonce").value = choixId;
					(function(){
						requetes(elem,'actDeleteAnnonce');
					})();
        }
      
      </script>
      
    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>

    <script>
    $(document).ready(function(){
      $('.nav-link').click(function(){
        $('.nav-link').removeClass('active');
        $(this).addClass('active');
      })
    })

</script>
  </body>
</html>