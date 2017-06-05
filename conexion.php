<?php
$mysqli= mysqli_connect('localhost', 'unidadge_usuario', 'kC+8h%poaET4', 'unidadge_netica');

mysqli_set_charset($mysqli,"utf8");
//$mysqli= mysqli_connect('localhost', 'root', '', 'ug'); local
if (!$mysqli) {
    die('Could not connect: ' . mysql_error());
}


//$host = 'localhost';
//$user = 'unidadge_usuario';
//$pass = 'kC+8h%poaET4';
//$db = 'unidadge_netica';
//
//$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
//
//if(mysqli_connect()){
//    
//    echo "conexion exitosa";
//}
//else{
//    echo "Abrete ".mysqli_connect_error();
//}
?>