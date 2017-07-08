<?php 
ob_start();
require 'conexion.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign-Up/Login Form</title>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Unidad Genética</title>
        
        <!-- Compressed CSS -->
		<?php include('header.php'); ?>

</head>
<?php      
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) {       
        require 'login-test.php';
        $error=$_SESSION['message'];
    }
}
?>
    <body>

    <div class="row">
        
        <div class="medium-4 columns log-in-form">
         
                <form action="index.php" method="post" autocomplete="off">  
                    <h4>Resultados</h4>
                        <label for="login">Correo registrado</label>
                        <input type="email" required autocomplete="off" name="email"/>
                        <label for="pass">Contraseña</label>
                        <input type="password" required autocomplete="off" name="password"/>

                        <button class="button small expand" name="login">Iniciar sesión </button>
                         <p class="forgot"><a href="forgot.php">¿Olvidaste tu contraseña?</a></p>
                    
                  </form>
				      <?php 
                            if($error){

								echo '  <div data-alert class="alert-box alert" tabindex="0" aria-live="assertive" role="alertdialog">'.$error.'<button tabindex="0" class="close" 
								aria-label="Close Alert">&times;</button>
								</div>';
							
							} 
                        ?>
       
        </div>
        <div class="medium-4 columns info-consulta">
		
            <h4>Consulta de resultados</h4>   
            <p>Para consulta de resultados se proveerá de una cuenta de acceso al momento de solicitar la realización de estudios en las instalaciones de Unidad de Genética Aplicada.
			Dudas o aclaraciones <a href="mailto:contacto@unidadgenetica.com">contacto@unidadgenetica.com</a></p>
        </div>
           
    </div>
    <script src="js/index.js"></script>
    </body>
	<script type="text/javascript">

				$(document).foundation();
	
	</script>
</html>
<?php
ob_end_flush();
?>