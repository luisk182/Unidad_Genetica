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
    <link rel="stylesheet" href="css/main.css">
        <!-- Compressed CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
  
        <!-- Compressed JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>
        <script src="js/foundation/foundation.alerts.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="js/foundation/foundation.alerts.js"></script>
</head>

<body>

        <div class="row">
            <div class="medium-4 medium-centered text-center">
                <div class="log-out">
                    <h3>¡Adios!</h3>
                        <p><?= 'Has cerrado sesión corretamente!'; ?></p>
          
                    <a href="index.php">
                        <button class="button button-block">
                            Ir al inicio
                        </button>
                    </a>
                </div>
            </div>
</div>
    
</body>
</html>
