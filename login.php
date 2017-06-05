<?php
/* User login process, checks if user exists and password is correct */
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM usuario WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "Ese usuario no existe";
    
}
else { // User exists
    $user = $result->fetch_assoc();
	//print_r($user); die;
    if (password_verify($_POST['password'], $user['password']) ) {
		
        $_SESSION['email'] = $user['email'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['apellido'] = $user['apellido'];
        $_SESSION['activo'] = $user['activo'];
		$_SESSION['IdUsuario'] = $user['IdUsuario'];
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['perfil'] = $user['perfil'];
        
        //header("Location: genetica/reporteAdmin.php");   
        //header("Location: genetica/reportePaciente.php");   
      
    if($user['perfil']==1){
        echo "<script>window.parent.location = '../encuesta-de-satisfaccion-laboratorio/'</script>";
        die; 
     }if($user['perfil']==2){
        echo "<script>window.parent.location = '../encuesta-de-satisfaccion-medicos/'</script>";
        die; 
     }if($user['perfil']==3){
       // echo "<script>window.parent.location = '../encuesta-de-satisfaccion-paciente/'</script>";
	   header("Location: genetica/reportePaciente.php");
        die; 
     }if($user['perfil']==4){
       echo "<script>window.parent.location = '../SistemaUG/genetica/reporteAdmin.php'</script>";
     }
    }
    else {
        $_SESSION['message'] = "Has ingresado una contraseña incorrecta";
        
    }
}
?>
