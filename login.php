<?php

$email = $mysqli->escape_string($_POST['correo']);
$result = $mysqli->query("SELECT * FROM usuario WHERE Correo='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['mensaje'] = "User with that email doesn't exist!";
    header("location: adminpage.php");
}
else { // User exists
    $user = $result->fetch_assoc();
  

    if ($_POST['passwrod']==$user['password']) {
        
        $_SESSION['IdPerfil'] = $user['IdPerfil'];
        $_SESSION['Nombre'] = $user['Nombre'];
        $_SESSION['Apellido'] = $user['Apellido'];
        $_SESSION['logged'] = true;
        
        header("location: adminpage.php");
    } 
    else {
        echo "Valio becky";
//        $_SESSION['mensaje'] = "You have entered wrong password, try again!";
//        header("location: error.php");
    }
}
?>
