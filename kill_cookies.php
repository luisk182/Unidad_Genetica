<?php

$cookie_name = 'first';
unset($_COOKIE[$cookie_name]);
// empty value and expiration one hour before
$res = setcookie($cookie_name, '', time() - 43200);

?>