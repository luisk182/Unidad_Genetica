<?php
session_start();
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Debes iniciar sesion";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $name = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $email = $_SESSION['email'];
    $activo = $_SESSION['activo'];
	$perfil = $_SESSION['perfil'];
	$emailshow= $_SESSION['email'];
	
	
	
}
?>
<?php	
		// Check if form submitted with method="post"
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
{   
	require '../conexion.php';
    $email = $_SESSION['email'];
    $result = $mysqli->query("SELECT * FROM usuario WHERE email='$email'");

    if ( $result->num_rows == 0 ) // User doesn't exist
    { 
        $_SESSION['message'] = "Ese usuario no exist";
        header("location: ../error.php");
    }
    else { // User exists (num_rows != 0)

        $user = $result->fetch_assoc(); // $user becomes array with user data
        
        
        $hash = $user['hash'];
        $nombre = $user['nombre'];

      
        $_SESSION['message'] = "<p>Se ha enviado un correo a: <span>$email</span>"
        . " para confirmar tu cambio de contraseña</p>";

        // Send registration confirmation link (reset.php)
        $to      = $email;
        $subject = 'Restablecer contraseña (Unidad Genética Aplicada)';
        $body = '
        Hola '.$nombre.',

       Has solicitado cambio de contraseña

       Haz click en el siguiente enlace para resetear tu contraseña

      http://unidadgenetica.com/SistemaUG/reset.php?email='.$email.'&hash='.$hash;

        mail($to, $subject, $body);
	}
}
	?>
	
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Unidad Genetica </title>
  <meta charset="utf-8">
        
        <title>Unidad Genética</title>
        
        <?php include('header_in.php'); ?>
    
        <link rel="stylesheet" href="../css/main.css">
</head>

<body>
    <nav class="top-bar" data-topbar role="navigation">
        <?php 
		
		if($perfil!=4 and $perfil!=5){
				include('menu_pac.php');
		}	
		else{
			include('menu.php');
		}

		?>
    </nav>
 
  <div class="row">
		<form method="post" action="profile.php">
         <div class="medium-6 medium-offset-3 columns log-in-form">
             <div class="profile">
          <h4>Datos de usuario</h4>
          
          <p>
				<i class="fi fi-torso"></i> <?php echo $name.' '.$apellido; ?><br>
				<i class="fi fi-mail"></i> <?= $emailshow; ?><br>
				 <i class="fi fi-lock"></i><span id="pass"></span> <button class="tiny">Cambiar contraseña</button>
		 </p>
		
		 <?php if($mensaje){
			 echo $mensaje;
		 }
		 
		 ?>
	
		 </form>
               <?php   
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              unset( $_SESSION['message'] );
          }
          ?>
          
        
        </div>
    </div>
    </div>
	


</body>
</html>
