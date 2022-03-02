<?php

session_unset($_SESSION['dlogin']);
session_destroy();
header('location:http://abhishek2003.epizy.com/phpprojects/AdminLTE-3.2.0/pages/examples/login.php?log');
?>