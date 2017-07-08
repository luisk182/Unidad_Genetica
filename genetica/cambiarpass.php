<?php
require '../conexion.php';
session_start();




	if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 
		
		  $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
		  $sql = "UPDATE usuario SET password='".$new_password."' WHERE email='".$email."'";
	}
	   if ( $mysqli->query($sql) ) {
			$mensaje = "Tu contraseña se ha cambiado correctamente.";
	   }



else
{
	$mensaje = "las contraseñas no coinciden.";
}