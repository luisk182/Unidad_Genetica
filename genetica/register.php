<?php

// $_SESSION['email'] = $_POST['email'];
// $_SESSION['nombre'] = $_POST['nombre'];
// $_SESSION['apellido'] = $_POST['apellido'];
header("Content-Type: text/html;charset=utf-8");

$nombre = $mysqli->escape_string($_POST['nombre']);
$apellido = $mysqli->escape_string($_POST['apellido']);
$telefono = $mysqli->escape_string($_POST['telefono']);
$perfil = $mysqli->escape_string($_POST['perfil']);
$laboratorio = $mysqli->escape_string($_POST['laboratorio']);
$email = $mysqli->escape_string($_POST['email']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
$alert="";      
$passuncrypt=$_POST['password'];
$enviarcorreo= $_POST['enviar'];
$result = $mysqli->query("SELECT * FROM usuario WHERE email='$email'") or die($mysqli->error());


if ( $result->num_rows > 0 ) {
    
    $_SESSION['alert-error'] = 'Ese usuario ya está registrado';

}
else if(ctype_space($nombre) || ctype_space($password) || ctype_space($telefono)){
	 $_SESSION['alert-error'] = 'No se aceptan espacios en blanco en Nombre';
}
else if(ctype_space($apellido)){
	 $_SESSION['alert-error'] = 'No se aceptan espacios en blanco en Apellido';
}

else { 
    $sql = "INSERT INTO usuario (nombre, apellido, email, password, hash, telefono, perfil, laboratorio) " 
            . "VALUES ('$nombre','$apellido','$email','$password', '$hash', '$telefono', '$perfil', '$laboratorio')";

    $_SESSION['alert']="Usuario registrado con éxito";
    if ( $mysqli->query($sql) and  $enviarcorreo=="si"){

        $_SESSION['activo'] = 0; 
        $_SESSION['logged_in'] = true; 
        $_SESSION['message'] =
                
                 "Se ha enviado un enlace de confirmación a $email, por favor verifiquen la cuenta";

     
        $to      = $email;
		$subject  = 'Verificar correo';
		$headers = 'MIME-Version: 1.0' . "\r\n";  
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		$headers .= 'From: verificarcorreo@unidadgenetica.com' . "\r\n";  
		
		
		
        $body = '<table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#ffffff">
  <tbody><tr>
    <td align="center" valign="top" style="background-color:#f2f2f2">


      <table align="center" border="0" cellpadding="0" cellspacing="0" width="500">
        <tbody>
          <tr>
          <td style="display:none">
            <div style="display:none;font-size:0px;max-height:0px;line-height:0px;padding:0">Verifica tu correo y accede a tus resultados en línea.
          </td>
        </tr>
          <tr>
          <td>
            <span>&nbsp;</span>
          </td>
        </tr>
        <tr>
          <td>
            <table cellpadding="0" cellspacing="0" border="0" bgcolor="#ffffff" align="left" style="width:100%;max-width:520px">
              <tbody><tr>
                <td valign="middle" align="left" bgcolor="#ffffff" style="font-size:0pt;line-height:0pt;padding-top:16px;padding-bottom:16px;padding:20px 30px 10px 30px"> <a href="http://www.unidadgenetica.com" target="_blank" title="Visitar Unidad de Genética Aplicada"><img src="http://www.unidadgenetica.com/wp-content/uploads/logo.png" alt="Unidad de Genética Aplicada" width="256" height="89" border="0" style="display: block; max-width: 1895px;"></a> </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
        <tr>
          <td>
            <table bgcolor="#ffffff" align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:520px">
              <tbody><tr>
                <td style="padding:0 30px 20px 30px" bgcolor="#ffffff">
<table align="left" border="0" cellpadding="0" cellspacing="0" style="width:460px">
  <tbody><tr>
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
          <td align="left" bgcolor="#fafafa" style="color: #00a0f0;font-family: arial,sans-serif;font-size: 14px;line-height: 24px;text-align: left;padding-bottom: 18px;font-weight: bold;background: #fafafa;padding: 10px 20px;"> “Antes pensábamos que nuestro futuro estaba en las estrellas, ahora sabemos que está en nuestros genes” <span style="color:#040707;text-decoration:none;font-weight:normal"><br>— James Watson.</span></td>

        </tr>
        <tr>
          <td align="left" style="color:#040707;font-family:arial,sans-serif;font-size:22px;line-height:30px;font-weight:900;padding:20px 0 18px 0;text-align:left"> Bienvenido</td>
        </tr>
        <tr>
          <td align="left" style="color:#040707;font-family:arial,sans-serif;font-size:15px;line-height:24px;text-align:left;padding-bottom:18px;font-weight:normal;"><span>'.$nombre.'</span>, verifica tu correo y accede a tus resultados en línea.<br>
		  <span style="font-size:12px;"><strong>Para acceder a tus resultados, debes contestar una pequeña encuesta<strong><span></td>
        </tr>
        <tr>
          <td align="left" style="color:#040707;font-family:arial,sans-serif;font-size:15px;line-height:24px;text-align:left;padding-bottom:18px;font-weight:normal;">
            Usuario: <strong> <span style="color:#040707;font-family:arial,sans-serif;font-size:15px;line-height:24px;text-align:left;padding-bottom:18px;font-weight:bold;text-decoration:none;">'.$email.'</span></strong> <br>
 
          </td>
        </tr>
        <tr>
          <td style="padding: 20px 0 0 0"> <a href="#" style="text-decoration:none;border:0" target="_blank">
            <table bgcolor="#00a0f0"  align="center" border="0" cellspacing="0" cellpadding="0" width="50%">
              <tbody>
                <tr>
                  <td style="text-align:center;font-size:18px;line-height:18px;font-weight:bold;padding:14px 20px;color:#ffffff;font-family:arial,sans-serif;">
                    <a href="http://unidadgenetica.com/SistemaUG/set.php?email='.$email.'&hash='.$hash.'" style="text-decoration:none;text-align:center;none;color:#ffffff;border:0;font-family:arial,sans-serif; " target="_blank">Establece tu contraseña</a>
                  </td>
                </tr>
              </tbody>
            </table>
            </a> </td>
        </tr>
        <tr>
          <td align="left" style="color:#040707;font-family:arial,sans-serif;line-height:24px;text-align:left;padding-top:30px;font-size:11px;"><a href="mailto:contacto@unidadgenetica.com" style="color:#00a0f0;font-weight:normal;text-decoration:none" target="_blank">contacto@unidadgenetica.com</a> - <a href="tel:5552465000" style="color:#00a0f0;font-weight:normal;text-decoration:none" target="_blank">01(55) 5246 5000</a> ext. 3026 y 3027 y <a href="tel:5552469610" style="color:#00a0f0;font-weight:normal;text-decoration:none" target="_blank">01(55) 5246 9610</a>.
        </td></tr><tr>
      </tr></tbody></table>
    </td>
  </tr>
</tbody></table>
                </td>
              </tr>
            </tbody></table>
          </td>
        </tr>
                              <tr>
          <td>
            <table align="center" cellpadding="0" cellspacing="0" border="0" style="width:100%;max-width:520px">
              <tbody><tr>
                <td bgcolor="#f2f2f2">&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#f2f2f2" align="center" style="font-family:arial,sans-serif;font-size:11px;line-height:18px;color:#88898c;padding-bottom:6px"> <span><a style="color:#88898c;text-decoration:none;font-weight:bold;line-height:27px;" href="http://www.unidadgenetica.com/aviso-de-privacidad/" target="_blank">Aviso de Privacidad</a><br>
                  Recibiste este mensaje debido a que solicitaste estudios genéticos con nosotros. <br>
                  Si no quieres recibir estos correos de Unidad de Genética Aplicada en el futuro, puedes <br>
                  solicitar darte de baja al siguiente correo:  <a style="color:#88898c;text-decoration:underline;font-weight:bold" href="mailto:contacto@unidadgenetica.com" target="_blank">contacto@unidadgenetica.com</a>.</span><br>
                  © 2017 <a href="http://www.unidadgenetica.com" style="color:#88898c;text-decoration:none;line-height:30px;" target="_blank">Unidad de Genética Aplicada</a>
                    </td>
              </tr>
              <tr>
                <td bgcolor="#f2f2f2">&nbsp;</td>
              </tr>
            </tbody></table>
          </td>
        </tr>
      </tbody></table>
    </td>
  </tr>
</tbody></table>';
        mail( $to, $subject, $body, $headers );
    }

    else {
        $_SESSION['message'] = 'Error al registrar';
        header("location: error.php");
    }

}