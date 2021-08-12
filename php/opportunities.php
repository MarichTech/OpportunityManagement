<?php
//including the database connection file
include_once("../assets/db/config.php");
session_start();

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
 
//getting id from url
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $_SESSION['AccountId'] = $id;
     
}

    $AccountId = $_SESSION['AccountId'];
    $sql = "SELECT * FROM opportunities WHERE AccountId = $AccountId  ORDER BY OpportunityId DESC";
    $result = mysqli_query($conn, $sql); // using mysqli_query 

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

?>
</div>
<div class="title">
<form action="../php/addOpportunity.php" method="POST">
  <h3>Create a new Opportunity</h3><br>

	<input type="text" placeholder="Name" name="name" required>
	<input type="text" placeholder="Amount" name="amount" required>
	<input type="text" placeholder="Stage" name="stage" required>
	<button class="button button1" name="add" type="submit">Add</button>
</form>
<br>
<hr>
<table>
  <caption>Opportunities</caption>
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
    echo "<td> <a href=\"editOpportunity.php?id=$res[OpportunityId]\" onClick=\"return confirm('Do you want to Update this Opportunity?')\">Update</a> 
    | <a href=\"deleteOpportunity.php?id=$res[OpportunityId]\" onClick=\"return confirm('Are you sure you want to delete this Opportunity?')\">Delete</a></td>";   
  }
  ?>
  </tbody>
</table>
</div>
</header>
</body>
</html> 
