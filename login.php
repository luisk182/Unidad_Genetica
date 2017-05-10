<?php
/* User login process, checks if user exists and password is correct */
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM usuario WHERE email='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "Ese usuario no existe";
    
}
else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['apellido'] = $user['apellido'];
        $_SESSION['activo'] = $user['activo'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['perfil'] = $user['perfil'];
        

        if($_SESSION['perfil']==1)
        {
            header("location: genetica/reporteAdmin.php");
        }
        else
        {
            header('location: genetica/reportePaciente.php');
        }
    }
    else {
        $_SESSION['message'] = "Has ingresado una contraseña incorrecta";
        
    }
}

?>