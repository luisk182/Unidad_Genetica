<?php
$mysqli= mysqli_connect('localhost', 'root', '', 'ug');

mysqli_set_charset($mysqli,"utf8");
//$mysqli= mysqli_connect('localhost', 'root', '', 'ug'); local
if (!$mysqli) {
    die('Could not connect: ' . mysql_error());
}

?>