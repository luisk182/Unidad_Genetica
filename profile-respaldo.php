<?php
session_start();
// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Debes iniciar sesion";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $email = $_SESSION['email'];
    $activo = $_SESSION['activo'];
	$perfil = $_SESSION['perfil'];
	$emailshow= $_SESSION['email'];
}
?>
<?php	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
				require '../conexion.php';
				
				
				$result = $mysqli->query("SELECT * FROM usuario WHERE email='$email'");
				 $user = $result->fetch_assoc(); // $user becomes array with user data
					
					
					$email = $user['email'];
					$password = $user['password'];
					
								

			if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 
				$new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
				$hash = $user['hash'];
				
				$sql = "UPDATE usuario SET password='$new_password', hash='$hash' WHERE email='$email'";
				
			}
			   if ( $mysqli->query($sql) ) {
					$mensaje = "Tu contraseña se ha cambiado correctamente.";
			   }
		else
		{
			$mensaje = "las contraseñas no coinciden.";
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
		
		if($perfil==4){
			include('menu.php');
		}	
		else{
			include('menu_pac.php');
		}

		?>
    </nav>
 
  <div class="row">
		<form method="post" action="profile.php">
         <div class="medium-6 medium-offset-3 columns log-in-form">
             <div class="profile">
          <h4>Datos de usuario</h4>
          
          <p>
          <?php   
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              unset( $_SESSION['message'] );
          }
          
          ?>
          </p>
         
          
          <p>
				<i class="fi fi-torso"></i> <?php echo $nombre.' '.$apellido; ?><br>
				<i class="fi fi-mail"></i> <?= $emailshow; ?><br>
				<i class="fi fi-telephone"></i> 939393 <br>
				<input type="text" id="newpassword">
				<input type="text" id="confirmnewpassword">
				<button class="button success tiny" id="boton">Aceptar </button>
				<i class="fi fi-lock"></i><span id="pass">* * * * * * * * * * * * *  </span><a href="#" id="cambiar">Cambiar contraseña</a>
				
		 </p>
		 <?php if($mensaje){
			 echo $mensaje;
		 }
		 
		 ?>
		 <script>
		 $(document).ready(function(){
			$("#newpassword").hide();
			$("#confirmnewpassword").hide();
			$("#boton").hide();
			$("#cambiar").click(function(){
				if($(this).text()=="Cambiar contraseña"){
					$(this).text("Cancelar");
					$("#pass").text("");
				}
				else{
					
					$(this).text("Cambiar contraseña");
					$("#pass").text(' * * * * * * * * * * * * *  ');
				}
				$("#newpassword").toggle();
				$("#confirmnewpassword").toggle();
				$("#boton").toggle();
				
				
				
			});
			
			});
		 </script>
		 </form>
          
        
        </div>
    </div>
    </div>
	


</body>
</html>
