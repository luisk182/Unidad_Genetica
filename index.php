<!doctype html>

<?php 

?>

<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Unidad Genética</title>
        <link rel="stylesheet" href="css/main.css">
        <!-- Compressed CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">

        <!-- Compressed JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>
       
          <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script>
            $(document).ready(function(){
                $("#user").fadeIn(700);
            
            });
        
        </script>
        <?php
            
               if (isset($_POST['login'])) {
              
                   require "login.php";
                   
                }

            ?>
    </head>
    
    <body>

   
    <section class="logform">
         <div class="row">
                <div class="medium-6 medium-centered large-4 large-centered columns">

                <form action="index.php" method="post">
                    <div class="row column log-in-form">
        
                        <input type="text" name="correo" placeholder="Correo electrónico" id="user" >
        
                        <input type="password" name="password" placeholder="Contraseña" >
      
                        <button type="submit" class="button expanded" name="login" id="boton">Iniciar</button>
                      
                    </div>

                </form>

                </div>
            </div>
        
        </section>
    
        <script>
            $(document).foundation();
            
            $("#boton").click(function(){
                
                $("#alert").fadeIn();
            });
        </script>
    
    </body>









</html>