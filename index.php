<?php 
/* Main page with two forms: sign up and log in */
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
        <link rel="stylesheet" href="css/main.css">
        <!-- Compressed CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
  
        <!-- Compressed JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/js/foundation.min.js"></script>
        <script src="js/foundation/foundation.alerts.js"></script>
        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="js/foundation/foundation.alerts.js"></script>

</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST['login'])) { 

        require 'login.php';
        $error=$_SESSION['message'];
    }
    
//    elseif (isset($_POST['register'])) { 
//        
//        require 'register.php';
//        
//    }
}
?>
    <body>
<section class="logform">
   
    <div class="row columns">
        <div class="medium-offset-8"></div>
        <div class="medium-4 columns">
            <div class="log-in-form">
                <form action="index.php" method="post" autocomplete="off">  
                    <h4>Inicia sesión</h4>
                 
                        <input type="email" required autocomplete="off" name="email" placeholder="Email"/>
                        <input type="password" required autocomplete="off" name="password" placeholder="Contraseña"/>

                        <button class="button button expanded" name="login">Iniciar sesión </button>
                         <p class="forgot"><a href="forgot.php">¿Olvidaste tu contraseña?</a></p>
                        <?php 
                            if($error){ echo $error;} 
                        ?>
                  </form>
            </div>
        </div>
           
    </div>
                    
</section>
  
<!--
      <div class="row columns">
        <div class="medium-offset-8"></div>
        <div class="medium-4 columns">
     <div id="signup">   
          
          <form action="index.php" method="post" autocomplete="off">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' />
            </div>
        
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' />
            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="off" name='email' />
          </div>
          
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password'>
          </div>
          
          <button type="submit" class="button expanded" name="register" >Register</button>
          
          </form>
            </div>
          </div>
          
        </div> 
-->
          
    <script src="js/index.js"></script>

    </body>
</html>
