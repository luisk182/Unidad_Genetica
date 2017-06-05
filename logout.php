<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Salir</title>
        <!-- Compressed CSS -->
       <?php include('header.php'); ?>
</head>
<body>

        <div class="row">
            <div class="medium-4 medium-centered small-8 small-centered columns">
                <div class="log-out text-center">
                    <h3>¡Adiós!</h3>
                        <p><?= 'Has cerrado sesión corretamente.'; ?></p>
          
                    <a href="../../wp/index.php">
                        <button class="button expand small">
                            Ir al inicio
                        </button>
                    </a>
                </div>
            </div>
		</div>
    
</body>
</html>
