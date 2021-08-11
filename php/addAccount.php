<?php 
include '../assets/db/config.php';

session_start();

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Query to check if the account exist
$checkName = "SELECT * FROM accounts WHERE Name = '$_POST[name]' ";

// Variable $result hold the connection data and the query
$result = $conn-> query($checkName);

// Variable $count hold the result of the query
$count = mysqli_num_rows($result);

// If count == 1 that means the email is already on the database
if ($count == 1) {
echo "<div class='alert alert-warning mt-4' role='alert'>
        <p>That Account already exist.</p>
      </div>";
} else {	

/*
If the username don't exist, the data from the form is sent to the
database and the account is created
*/

$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$address = $_POST['address'];
$UserId = $_SESSION['UserId'];


// Query to save username and Password hash to the database
$query = "INSERT INTO accounts ( UserId,Name, Email, Mobile, Address) VALUES ('$UserId', '$name', '$email', '$mobile', '$address')";

if (mysqli_query($conn, $query)) {
  echo "<div class='alert alert-success mt-4' role='alert'><h3>Your account has been created.</h3></div>";
  header('location: accounts.php');		
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }	
}	
mysqli_close($conn);

?>