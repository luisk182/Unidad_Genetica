<!doctype html>
<?php

session_start();


if ( $_SESSION['logged_in'] !=0 ) {
  $_SESSION['message'] = "Debes iniciar sesión";
  header("location: error.php");    
}
else {
    // Makes it easier to read
        $idusuario = $_SESSION['IdUsuario'];
        $nombre= $_SESSION['Nombre'];
        $apellido=$_SESSION['Apellido'];
        $activo=$_SESSION['logged'];
}
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Unidad Genética</title>
        <link rel="stylesheet" href="css/main.css">
         <!-- Compressed CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">

        <!-- Compressed JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>
       
          <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
    </head>
    
    
    <body>
    <div class="top-bar">
      <div class="top-bar-left">
        <ul class="dropdown menu" data-dropdown-menu>
          <li class="menu-text">Hola, <?php echo $nombre; ?></li>
          <li>
              <a href="#">Laboratorio</a>
          </li>
              <li><a href="#">Paciente</a></li>
              <li><a href="#">Médicos</a></li>
        </ul>
      </div>
    <div class="top-bar-right">
        <ul class="menu">
           
            <li><a href="logout.php"class="button">Cerrar Sesión</a></li>
        </ul>
    </div>

    </div>
    
        
        
        <script>
            $(document).foundation();
        </script>
    
    </body>









</html>