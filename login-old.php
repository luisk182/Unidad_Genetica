<?php
session_start();

    include("conexion.php");

if($_POST['submit']=="Iniciar")
{
    $query="select * from usuario where Correo='".$_POST["correo"]."' and password='".$_POST["password"]."' LIMIT 1";

    $result = mysqli_query($link, $query);
    $row= mysqli_fetch_array($result);
    
    if($row['IdPerfil']==4)
    {
        $_SESSION['IdUsuario']= $row['IdUsuario'];
        header("Location:reporte.php");
    }
  
    else 
        $error= "Checa tu email o contraseña";
}



?>