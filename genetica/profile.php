<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $nombre = $_SESSION['nombre'];
    $apellido = $_SESSION['apellido'];
    $email = $_SESSION['email'];
    $activo = $_SESSION['activo'];
	$perfil = $_SESSION['perfil'];
	
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
		<form method="post">
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
          <?php
          
          if ( !$activo ){
              echo
              '<div class="alert callout">
              Tu cuenta aún no ha sido verificada. Verifica tu cuenta haciendo clic en el enlace de tu correo
              </div>';
          }
          
          ?>
          
          <p>
				<i class="fi fi-torso"></i> <?php echo $nombre.' '.$apellido; ?><br>
				<i class="fi fi-mail"></i> <?= $email; ?><br>
				<i class="fi fi-telephone"></i> 939393 <br>
				<i class="fi fi-lock"></i> <input type="password" id="nuevo">
				<button class="button success tiny" id="boton">Aceptar </button>
				<span id="pass">* * * * * * * * * * * * *  </span><a href="#" id="cambiar">Modificar</a>
				
		 </p>
		 <script>
		 $(document).ready(function(){
			$("#nuevo").hide();
			$("#boton").hide();
			$("#cambiar").click(function(){
				if($(this).text()=="Modificar"){
					$(this).text("Cancelar");
					$("#pass").text("");
				}
				else{
					
					$(this).text("Modificar");
					$("#pass").text("* * * * * * * * * * * * *  ");
				}
				$("#nuevo").toggle();
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
