<?php
session_start();
session_destroy();

header( "refresh:0;url=https://mars.iuk.hdm-stuttgart.de/~jv029/login.php" );
?>