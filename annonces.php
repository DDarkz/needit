<?php
include("bd/connexion.php");
session_start();

?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Les annonces</title>

    <?php include("includes/header-script.php"); ?>
    <style>
    #map{
      margin-top:1.5em;
      height:400px;
      width:100%;
    }
  </style>
  </head>
  <body id="page-top" onload="requetes(null,'actionLister');">

    <?php include("includes/menu.php"); ?>
   
    <!-- début section -->
    <section id="projects" class="projects-section bg-light">
    <!-- debut container -->
    <div class="container pt-5">
      
        
      <h1 class="ml-3">Annonces</h1>

        <!-- debut card-columns -->
      <form>
      <!-- ajax loader animation -->
      <div class="text-center">
        <div class="spinner-border" role="status">
          <span class="sr-only">Loading...</span>
        </div>
      </div>

      <!-- ici test recherche -->
      
      <div class="form-group row ml-3">
        <form method='post'>
          <input type='text'id='codePostale'name='codePostale' class="sm-2 col-form-label" placeholder="Code postal" aria-label="Recherche">
          <div class="ml-1 sm-5">
            <input type="button" class="btn btn-primary" value="Rechercher" onClick="requetes(null,'actRecherche');">
          </div>
        </form>
        </div>
      
        <div id="alert">
          <div class="alert" role="alert"></div>
        </div>

      <div class="card-columns" id="annoncesAccueil">
          <!-- ici load contenu des annonces -->
      </div>
      <div id="annoncesDetail">
        <!-- ici load contenu détail -->
      </div>

      <div id="map">aaaa</div>

      <input type="hidden" id="idAnnonce" name="idAnnonce" value="">
      <!-- Récuperer l'email -->
      <input type="hidden" id="email" name="email" value='<?= isset($_SESSION["courriel"])?>'>
    </form>
      <!-- debut card-columns -->
    </div>
    <!-- fin container -->
    </section>
    <!-- fin section -->

    <script type="text/javascript">
				function listerIdAnnonce(elem,choixId) {
					var idAnnonce = document.getElementById("idAnnonce").value = choixId;
					(function(){
            requetes(elem,'actionListerDetail');
					})();
        }
    </script>

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>

    <script>

       $("#voirAnnonce").click(function(){
          $("#annoncesAccueil").show();
          $("#annoncesDetail").hide();
        });

        $('.spinner-border').hide();
        $(document).bind("ajaxSend", function(){
          $(".spinner-border").show();
          }).bind("ajaxComplete", function(){
          $(".spinner-border").hide();
        });
    </script>

<script>
    function initMap(){
      // Map options
      var options = {
        zoom:10,
        center:{lat:45.48934115,lng:-73.10794069}
      }

      // New map
      var map = new google.maps.Map(document.getElementById('map'), options);

      // Array of markers
      var markers = [
        {
          // je veux code_postal:'H4E4B2'
          coords:{lat:45.48934115,lng:-73.90794069},
          iconImage:'http://www.joly-design.com/projets-ecole/gofor/images/map-icone.png',
          content:"<h1>Au secours ! Besoin de couche rapidement !</h1><p>(personne handicapé)besoin de lingettes pour bébé dans maximum une heure ! marque et type comme la photo Merci de me contacter!</p>"
        },
        {
         coords:{lat:45.48934115,lng:-73.10794069},
          iconImage:'http://www.joly-design.com/projets-ecole/gofor/images/map-icone.png',
          content:"<h1>Épicerie pour personne âgé!</h1><p>Ma liste d'achat figure sur la photo de l'Annonce merci de me contacter pour plus d'informations supplémentaires !</p>"
        },
        {
          coords:{lat:45.48934115,lng:-72.50794069},
          iconImage:'http://www.joly-design.com/projets-ecole/gofor/images/map-icone.png',
          content:"<h1>Achat pain</h1><p>pain toast comme figure sur la photo marque et type. Merci !!</p>"
        },
        {
          coords:{lat:45.38934115,lng:-73.10794069},
          iconImage:'http://www.joly-design.com/projets-ecole/gofor/images/map-icone.png',
          content:"<h1>achat bébé</h1><p>4 sacs prêt à manger pour bébé comme figure sur la photo de l'annonce je veux deux de chaque (marque et type pareil) magasin préféré :walmart merci!</p>"
        },
        {
          coords:{lat:45.48934115,lng:-72.50794069},
          iconImage:'http://www.joly-design.com/projets-ecole/gofor/images/map-icone.png',
          content:"<h1>Achat Walmart</h1><p>pizza congelé au chocolat / nutella/oeufs un paquet de 12 / 2 tablette chocolats de marque value de walmart (noisette et noire) Merci!</p>"
        }
      ];

      // Loop through markers
      for(var i = 0;i < markers.length;i++){
        // Add marker
        addMarker(markers[i]);
      }

      //google.maps.GeocoderComponentRestrictions

      // Add Marker Function
      function addMarker(props){
        var marker = new google.maps.Marker({
          position:props.coords,
          map:map,
          //icon:props.iconImage
        });

        // Check for customicon
        if(props.iconImage){
          // Set icon image
          marker.setIcon(props.iconImage);
        }

        // Check content
        if(props.content){
          var infoWindow = new google.maps.InfoWindow({
            content:props.content
          });


          marker.addListener('click', function(){
            infoWindow.open(map, marker);
            //geocode.
          });
        }
      }
    }
  </script>
  <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsguDEnEIm2jqKL7RmZVpPa70eZXfkRN0&callback=initMap">
    </script>
  </body>
</html>