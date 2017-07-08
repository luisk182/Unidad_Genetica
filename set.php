<?php
/* The password reset form, the link to this page is included
   from the forgot.php email message
*/
require 'conexion.php';
session_start();

//Comrpueba que el email y el hash no estén vacios
if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) )
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 

    
    $result = $mysqli->query("SELECT * FROM usuario WHERE email='$email' AND hash='$hash'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "Error";
        header("location: error.php");
    }
}
else {
    $_SESSION['message'] = "La verificación ha fallado, inténtalo más tarde";
    header("location: error.php");  
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Restablece tu contrasña</title>
 	<?php include('header.php'); ?>
</head>

<body>
    <div class="medium-4 medium-centered columns reset">

          <h3>Establece tu  contraseña</h3>
          
          <form action="set_password.php" method="post">
              

            <label>
             Contraseña<span class="req">*</span>
            </label>
            <input type="password"required name="newpassword" autocomplete="off"/>
         
              
        
            <label>
              Confirma contraseña<span class="req">*</span>
            </label>
            <input type="password"required name="confirmpassword" autocomplete="off"/>
        
          
          <!-- This input field is needed, to get the email of the user -->
          <input type="hidden" name="email" value="<?= $email ?>">    
          <input type="hidden" name="hash" value="<?= $hash ?>">    
              
          <button class="button expand small"/>Establecer</button>
          
          </form>

    </div>

</body>
</html>
