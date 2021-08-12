<?php 
include '../assets/db/config.php';

session_start();

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


if(isset($_POST['add']))
{	
////////////Add Opportunity to database
// Query to check if the opportunity exist and belongs to this user
$checkOpportunityName = "SELECT * FROM opportunities WHERE Name = '$_POST[name]' AND  UserId = $UserId";

// Variable $result hold the connection data and the query
$result = $conn-> query($checkOpportunityName);

// Variable $count hold the result of the query
$count = mysqli_num_rows($result);

// If count == 1 that means the opportunity is already on the database
if ($count == 1) {
echo "<div class='alert alert-warning mt-4' role='alert'>
        <p>That Account already exist.</p>
      </div>";
} else {	

/*
If the opportunity don't exist, the data from the form is sent to the
database and the opportunity is created
*/

$name = $_POST['name'];
$amount = $_POST['amount'];
$stage = $_POST['stage'];
$UserId = $_SESSION['UserId'];
$AccountId = $_SESSION['AccountId'];


// Query to save opportunity to the database
$query = "INSERT INTO opportunities ( UserId,Name, Amount, Stage, AccountId) VALUES ('$UserId', '$name', '$amount', '$stage', '$AccountId')";

if (mysqli_query($conn, $query)) {
  echo "<div class='alert alert-success mt-4' role='alert'><h3>Your opportunity has been created.</h3></div>";
  header('location: opportunities.php');		
  } else {
    echo "Error: " . $query . "<br>" . mysqli_error($conn);
  }	
}	
mysqli_close($conn);

}


?>