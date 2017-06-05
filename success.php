<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <?php include('header.php'); ?>
</head>
<body>

   
   
    <div class="row">
            <div class="medium-4 medium-centered text-center">
                <div class="log-out">
                   <h3>Listo</h3>
                         <?php 
						if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
							echo $_SESSION['message'];    
						else:
							header( "location: index.php" );
						endif;
						?>
						
                    <a href="index.php">
                        <button class="button expand small">
                            Ir al inicio
                        </button>
                    </a>
                </div>
            </div>
		</div>
</div>
</body>
</html>
