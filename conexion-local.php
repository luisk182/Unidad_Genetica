<?php


$mysqli= mysqli_connect('localhost', 'root', '', 'ug');
if (! $mysqli) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($mysqli);

///* Database connection settings */
//$host = 'localhost';
//$user = 'root';
//$pass = '';
//$db = 'ug';
//$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
//
//
//if(mysqli_connect()){
//    
//    echo "conexion exitosa";
//}
//else{
//    echo "error de conexion";
//}
?>