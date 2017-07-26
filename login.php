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
		$_SESSION['laboratorio']= $user['laboratorio'];
       
        $_SESSION['logged_in'] = true;
        $_SESSION['perfil'] = $user['perfil'];
		
		if($_SESSION['activo']!=1)
		{
			 $_SESSION['message'] = "Tu cuenta no ha sido activada";
			 
		}
		
		else 
		$i=$user['perfil'];
		
		switch($i)
		{
		case 1:
			if (!isset($_COOKIE['first-lab']))
			{
				
				setcookie("first-lab", "no", time()+(2678400*6));
				echo "<script>window.parent.location = '../encuesta-de-satisfaccion-laboratorio/'</script>";
			}
			else
			{
				echo "<script>window.parent.location = '../SistemaUG/genetica/reporteLaboratorio.php'</script>";
			}
			die;
		break;
		case 2:
		if (!isset($_COOKIE['first-medico']))
			{
				setcookie("first-medico", "no", time()+(2678400*6));
				echo "<script>window.parent.location = '../encuesta-de-satisfaccion-medicos/'</script>";
			}
			else
			{
				echo "<script>window.parent.location = '../SistemaUG/genetica/reporteMedico.php'</script>";
			}
			die;
		break;
		case 3:
			
			echo "<script>window.parent.location = '../encuesta-de-satisfaccion-paciente/'</script>";
			die;
		break;
		case 4:
			echo "<script>window.parent.location = '../SistemaUG/genetica/reporteAdmin.php'</script>";
		break;
		case 5:
			echo "<script>window.parent.location = 'genetica/reporteAdmin.php'</script>";
		break;
		
		default:
		
		break;
	}

	
    
}
else {
        $_SESSION['message'] = "Has ingresado una contraseña incorrecta";
        
    }
}
?>
