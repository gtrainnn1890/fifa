<?php
require 'core.inc.php';
require 'connect.inc.php';



  if (loggedin()) {
    $firstname = getuserfield('firstname');
    $lastname = getuserfield('lastname');
    echo 'You are logged in, '.$firstname.' '.$lastname.'. <a href="logout.php">Log out</a><br>';

  } else {
    include 'loginform.inc.php';

  }

?>
