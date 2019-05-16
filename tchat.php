<?php
include("bd/connexion.php");
session_start();
$_SESSION['idAnnonce'] = $_GET['idAnnonce']
?>
<!doctype html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Tchat</title>

    <?php include("includes/header-script.php"); ?>
  </head>
  <body id="page-top">

    <?php include("includes/menu.php"); ?>
   
    <!-- debut section -->
    <section id="projects" class="projects-section bg-light">
    <!-- debut container -->
    <div class="container pt-5">
        <div class="row">
            <div class="col-6 mx-auto">
                <div class="messages-box"></div>
            </div>

            <div class="col-12 mt-2 mx-auto">
                <div class="form-group row col-sm-12 col-md-7 mx-auto">
                    <div class="col-sm-12">
                        <textarea rows="4" cols="50" name="message" id="message" placeholder="Votre message" class="form-control"></textarea>
                    </div>
                    <div class="col-sm-12 mt-3">
                        <input type="submit" id="send" name="send" class="btn btn-dark" value ="Envoyer"/>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    <!-- fin container -->
    </section>
    <!-- fin section -->

    <?php include("includes/footer.php"); ?>
    <?php include("includes/footer-script.php"); ?>
    <script>
        $(document).ready(function() {

            recupMessage();

            $('#send').click(function(){
            var message = $('#message').val();

                if(message != ''){
                    $.post('ajax/post.php',{message:message},function(){
                    recupMessage();
                    $('#message').val('');
                });
            }
        });

            function recupMessage(){
                $.post('ajax/recup.php',function(data){
                $('.messages-box').html(data);

            });
        }

        // setInterval(recupMessage,1000);

        });
    </script>
  </body>
</html>