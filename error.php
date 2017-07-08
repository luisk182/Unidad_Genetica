<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
	<?php include('header.php'); ?>
<body>
   <div class="row">
            <div class="medium-4 medium-centered small-8 small-centered columns">
                <div class="log-out text-center">
                   <h3>Error</h3>
                         <?php 
						if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ){
							echo $_SESSION['message'];    
							}
						?>
						<br>
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
</body>
</html>
