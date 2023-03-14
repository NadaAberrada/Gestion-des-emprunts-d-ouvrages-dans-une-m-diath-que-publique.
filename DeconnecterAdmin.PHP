<?php
session_start(); // start the session
session_destroy(); // end the session

// redirect to the login page
header("Location: http://localhost:8080/brief16/loginAdmin.php");
exit(); // ensure that script execution stops here
?>