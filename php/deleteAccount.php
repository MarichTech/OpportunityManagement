<?php
//including the database connection file
include_once("../assets/db/config.php");
session_start();

//getting id of the data from url
$id = $_GET['id'];




$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  
  $sql = "DELETE FROM accounts WHERE AccountId=$id";
        $result = mysqli_query($conn, $sql); // using mysqli_query 
        //redirecting to the display page 
        header("Location: accounts.php");



?>

