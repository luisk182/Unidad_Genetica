<?php

session_start();
session_unset();
session_destroy(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
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
    <div>
          <h1>Has salido correctamente</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="index.php"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>