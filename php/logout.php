/* Destroy current user session */

<?php
session_start();
session_unset($_SESSION['Username']);
session_destroy();

header('location: ../html/login.html');
?>