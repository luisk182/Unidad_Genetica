<?php 
/* Verifies registered user email, the link to this page
   is included in the register.php email message 
*/
require 'conexion.php';
session_start();

// Make sure email and hash variables aren't empty
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']))
{
    $email = $mysqli->escape_string($_GET['email']); 
    $hash = $mysqli->escape_string($_GET['hash']); 
    
    // Select user with matching email and hash, who hasn't verified their account yet (activo = 0)
    $result = $mysqli->query("SELECT * FROM usuario WHERE email='$email' AND hash='$hash' AND activo='0'");

    if ( $result->num_rows == 0 )
    { 
        $_SESSION['message'] = "La cuenta ya ha sido activada previamente";

        header("location: error.php");
    }
    else {
        $_SESSION['message'] = "Tu cuenta ha sido activada";
        
        // Set the user status to activo (activo = 1)
        $mysqli->query("UPDATE usuario SET activo='1' WHERE email='$email'") or die($mysqli->error);
        $_SESSION['activo'] = 1;
        
        header("location: success.php");
    }
}
else {
    $_SESSION['message'] = "Error";
    header("location: error.php");
}     
?>