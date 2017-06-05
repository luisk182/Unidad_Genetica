<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <head>
  <title>Sign-Up/Login Form</title>
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
</head>
<body>
<div class="form">
    <h1>Error</h1>
    <p>

    <?php /*
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;*/
    ?>

    </p>     
    <a href="index.php"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
