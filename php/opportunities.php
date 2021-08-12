<?php
//including the database connection file
include_once("../assets/db/config.php");
session_start();

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $UserId = $_SESSION['UserId'];
$sql = "SELECT * FROM opportunities WHERE UserId = $UserId  ORDER BY OpportunityId DESC";
$result = mysqli_query($conn, $sql); // using mysqli_query 

if(isset($_POST['add']))
{	
////////////Add Opportunity to database
// Query to check if the opportunity exist and belongs to this user
$checkOpportunityName = "SELECT * FROM opportunities WHERE Name = '$_POST[name]' AND  UserId = $UserId";

// Variable $result hold the connection data and the query
$result = $conn-> query($checkOpportunityName);

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
$amount = $_POST['amount'];
$stage = $_POST['stage'];
$UserId = $_SESSION['UserId'];
$AccountId = $_SESSION['UserId'];


// Query to save username and Password hash to the database
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


<!DOCTYPE html>
<html lang="en">
<head>
<title> OPPORTUNITY MANAGEMENT SYSTEM</title>
<link rel="stylesheet" type="text/css" href="../css/accounts.css">
<link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body>
	

<header>
<div class="admin">
<div class="logo">
<img src="https://lh3.googleusercontent.com/fife/ABSRlIoGiXn2r0SBm7bjFHea6iCUOyY0N2SrvhNUT-orJfyGNRSMO2vfqar3R-xs5Z4xbeqYwrEMq2FXKGXm-l_H6QAlwCBk9uceKBfG-FjacfftM0WM_aoUC_oxRSXXYspQE3tCMHGvMBlb2K1NAdU6qWv3VAQAPdCo8VwTgdnyWv08CmeZ8hX_6Ty8FzetXYKnfXb0CTEFQOVF4p3R58LksVUd73FU6564OsrJt918LPEwqIPAPQ4dMgiH73sgLXnDndUDCdLSDHMSirr4uUaqbiWQq-X1SNdkh-3jzjhW4keeNt1TgQHSrzW3maYO3ryueQzYoMEhts8MP8HH5gs2NkCar9cr_guunglU7Zqaede4cLFhsCZWBLVHY4cKHgk8SzfH_0Rn3St2AQen9MaiT38L5QXsaq6zFMuGiT8M2Md50eS0JdRTdlWLJApbgAUqI3zltUXce-MaCrDtp_UiI6x3IR4fEZiCo0XDyoAesFjXZg9cIuSsLTiKkSAGzzledJU3crgSHjAIycQN2PH2_dBIa3ibAJLphqq6zLh0qiQn_dHh83ru2y7MgxRU85ithgjdIk3PgplREbW9_PLv5j9juYc1WXFNW9ML80UlTaC9D2rP3i80zESJJY56faKsA5GVCIFiUtc3EewSM_C0bkJSMiobIWiXFz7pMcadgZlweUdjBcjvaepHBe8wou0ZtDM9TKom0hs_nx_AKy0dnXGNWI1qftTjAg=w1920-h979-ft" alt="">
</div>
</div>
<div>
<?php
    if (isset($_SESSION['loggedin'])) {  

        require_once('../assets/header/header3.html');
    
    }
    else {
      require_once('../assets/header/header4.html');
    }
  //etc and default nav below

?>
</div>
<div class="title">
<form action="opportunities.php" method="POST">
  <h3>Create Opportunity</h3><br>

	<input type="text" placeholder="Name" name="name" required>
	<input type="text" placeholder="Amount" name="amount" required>
	<input type="text" placeholder="Stage" name="stage" required>
	<button class="button button1" name="add" type="submit">Add</button>
</form>
<br>
<hr>
<table>
  <caption>Account Summary</caption>
  <thead>
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Amount</th>
      <th scope="col">Stage</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php 

  while($res = mysqli_fetch_array($result)) {   
    
    echo "<tr>";
    echo "<td>".$res['Name']."</td>";
    echo "<td>".$res['Amount']."</td>";
    echo "<td>".$res['Stage']."</td>";  
    echo "<td> <a href=\"editAccount.php?id=$res[AccountId]\" onClick=\"return confirm('Do you want to Update this Account?')\">Update</a> 
    | <a href=\"deleteAccount.php?id=$res[AccountId]\" onClick=\"return confirm('Are you sure you want to delete this Account?')\">Delete</a></td>";   
  }
  ?>
  </tbody>
</table>
</div>
</header>
</body>
</html> 
