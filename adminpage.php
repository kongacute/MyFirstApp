<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seller - ATN Company</title>"
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$db_url = getenv("DATABASE_URL") ?: "postgres://stejeexemgbraf:a5a875444f2192a1fb8982b181a046ce7c194400d26f9c583934ddb28d6a7b80@ec2-50-19-127-115.compute-1.amazonaws.com:5432/d4brobjaq8sj8t";

$loginstatus = true;

$db = pg_connect($db_url);

$uname = $_POST['uname'];
$pwd = $_POST['pwd'];
$sqlcheckadmin = "SELECT * FROM admin WHERE user_name = ".$uname." AND password =".$pwd;
$sqlcheckuser = "SELECT * FROM customer WHERE user_name = ".$uname." AND password =".$pwd;
$queryadmin = "SELECT * FROM customer";
$resultcheckadmin = pg_query($db,$sqlcheckadmin);
$resultcheckuser = pg_query($db, $sqlcheckuser);

if (pg_num_rows($resultcheckuser)>0)
{
  header("Location: userpage.php");
  session_start();
  $_SESSION['uname'] = $uname;
  $_SESSION['pwd'] = $pwd;
}
?>
<div class="container">
  <h2>Customers List</h2>
  <p>List of customers</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Customer ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>City</th>
        <th>Region</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
      <?php
      
        $result = pg_query($db, $queryadmin);
        while ($results = pg_fetch_assoc($result)) {
          $userid = $results['customerid'];
          $name = $results['name'];
          $add = $results['address'];
          $city = $results['city'];
          $region = $results['region'];
          $phone = $results['phone'];
        echo "<tr></tr>";
        echo "<td>" . $userid . "</td>";  
        echo "<td>" . $name . "</td>";  
        echo "<td>" . $add. "</td>";
        echo "<td>" . $city . "</td>";
        echo "<td>" . $region . "</td>";
        echo "<td>" . $phone . "</td>"; 
        echo pg_num_rows($resultcheckuser); 
        echo "<tr></tr>";
    }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>