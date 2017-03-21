<?php

$host = 'localhost';
$user = 'root';
$pass = '';

$db = 'a_database';

if (!mysql_connect($host, $user, $pass)|| !mysql_select_db($db)) {
  die(mysql_error());
}

?>
