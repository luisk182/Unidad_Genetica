<?php

require 'conexion.php';
session_start();


if ($_SERVER['REQUEST_METHOD'] == 'POST') { 

    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = $mysqli->escape_string($_POST['email']);
        $hash = $mysqli->escape_string($_POST['hash']);
        $activar= 1;
        $sql = "UPDATE usuario SET password='$new_password', hash='$hash', activo='$activar' WHERE email='$email'";

        if ( $mysqli->query($sql) ) {

        $_SESSION['message'] = "Tu contraseña se ha restablecido correctamente!";
        header("location: success.php");    

        }

    }
    else {
        $_SESSION['message'] = "Las contraseñas no coinciden";
        header("location: error.php");    
    }

}
?>