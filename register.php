<?php
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */
// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['nombre'] = $_POST['firstname'];
$_SESSION['apellido'] = $_POST['lastname'];

// Escape all $_POST variables to protect against SQL injections
$nombre = $mysqli->escape_string($_POST['firstname']);
$apellido = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM usuario WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Ese usuario ya está regisrado';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // activo is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO usuario (nombre, apellido, email, password, hash) " 
            . "VALUES ('$nombre','$apellido','$email','$password', '$hash')";

    // Add user to the database
    if ( $mysqli->query($sql) ){

        $_SESSION['activo'] = 0; //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSION['message'] =
                
                 "Se ha enviado un enlace de confirmación a $email, por favor verifiquen la cuenta";

        // Send registration confirmation link (verify.php)
        $to      = $email;
        $subject = 'Account Verification ( clevertechie.com )';
        $message_body = '
        Hola '.$nombre.',

        Para verificar tu cuenta has click en el siguiente enalce:

        http://localhost/login-system/verify.php?email='.$email.'&hash='.$hash;  

        mail( $to, $subject, $message_body );

        header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Error al registrar';
        header("location: error.php");
    }

}