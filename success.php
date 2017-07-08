<?php
/* Displays all successful messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Listo</title>
  <?php include('header.php'); ?>
</head>
<body>

    <div class="row">
            <div class="medium-4 medium-centered small-8 small-centered columns">
                <div class="log-out text-center">
                   <h3>Listo</h3>
                         <?php 
						if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
							echo $_SESSION['message'];    
						else:
							header( "location: index.php" );
						endif;
						?>
						
                      <button class="button expand small" onclick="redirect();">
							Volver
                        </button>
				<script>
					function redirect(){
						
						window.parent.location = '../resultados';
					}
				</script>
                </div>
            </div>
		</div>
</div>
</body>
</html>
