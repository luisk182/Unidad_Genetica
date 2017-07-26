<?php 
/* Reset your password form, sends reset.php password link */
require 'conexion.php';
session_start();

// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM usuario WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "Ese usuario no existe";
        header("location: error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        $email = $user['email'];
        $hash = $user['hash'];
        $nombre = $user['nombre'];

        // Session message to display on success.php
        $_SESSION['message'] = "<p>Se ha enviado un correo a: <span>$email</span>"
        . " para confirmar tu cambio de contraseña</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
   
		$subject  = 'Restablecer acceso';
		$headers = 'MIME-Version: 1.0' . "\r\n";  
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: restableceracceso@unidadgenetica.com' . "\r\n";  
		$body = '
		<table>
			<tr>
				<td> Hola '.$nombre.', </td>
			<tr>
				<td>Has solicitado cambio de contraseña</td>
			</tr>
			<tr>
				<td>Da click en el siguiente enlace para resetear tu contraseña.</td> 
			</tr>
			<tr>
				<td><a href="http://unidadgenetica.com/SistemaUG/reset.php?email='.$email.'&hash='.$hash. '">Restablecer </a></td>
			</tr>
		</table>';

        mail($to, $subject, $body, $headers);

        header("location: success.php");
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Recupera tu contraseña</title>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Unidad Genética</title>
		<?php include('header.php'); ?>
</head>

<body>
    
     <div class="row">
		
            <div class="medium-6 medium-centered small-12 columns reset">

                        <h4>Restablece tu contraseña</h4>

                <form action="forgot.php" method="post">
     
                  
			<input type="email"required autocomplete="off" name="email" placeholder="Email"/>

			<button class="button expand small">Enviar</button>
                    
    </form>
   
         </div>
    </div>

</body>

</html>
