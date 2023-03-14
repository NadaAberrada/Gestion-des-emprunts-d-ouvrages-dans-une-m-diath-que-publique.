<?php session_start();
 ob_start();
// Check if the user is logged in


$ouvreID=$_SESSION['ouvredelete'];
$conn = new PDO("mysql:host=localhost;dbname=biblio;port=3306;charset=UTF8", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// modify query to include filter conditions
$stmt = $conn->prepare("DELETE FROM `reservation` WHERE  `ouvre_id` = $ouvreID;");
header("Location: http://localhost:8080/brief16/profil.php");
$stmt->execute();
ob_end_flush();
?>