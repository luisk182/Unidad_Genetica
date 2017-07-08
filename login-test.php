<?php
/* User login process, checks if user exists and password is correct */
//$email = $mysqli->escape_string($_POST['email']);
$email = $_POST['email'];
$result = $mysqli->query("SELECT * FROM usuario WHERE email='$email'");


if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "Ese usuario no existe";
    
}
else { // User existe
    $user = $result->fetch_assoc();
	//print_r($user); die;
    if (password_verify($_POST['password'], $user['password']) ) {
		
        $_SESSION['email'] = $user['email'];
        $_SESSION['nombre'] = $user['nombre'];
        $_SESSION['apellido'] = $user['apellido'];
        $_SESSION['activo'] = $user['activo'];
		$_SESSION['IdUsuario'] = $user['IdUsuario'];
		$_SESSION['laboatorio']= $user['laboratorio'];
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['perfil'] = $user['perfil'];
        
        //header("Location: genetica/reporteAdmin.php");   
        //header("Location: genetica/reportePaciente.php");   
      
	  
	  switch($user['perfil'])
	  {
		case 1:
			echo "Soy perfil 1 ";
			die;
		break;
		case 2:
			echo "Soy perfil 2 :D ";
			die;
		break;
		case 3:
			echo "Soy perfil 3 :s";
			die;
		break;
		case 4:
			echo "soy perfil 4";
			die;
		break;
		
		default:
			echo "No vale becky";
		break;
	}
	
	}
}
?>
