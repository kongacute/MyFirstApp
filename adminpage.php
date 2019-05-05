<!DOCTYPE html>
<?php
$db_url = getenv("DATABASE_URL") ?: "postgres://stejeexemgbraf:a5a875444f2192a1fb8982b181a046ce7c194400d26f9c583934ddb28d6a7b80@ec2-50-19-127-115.compute-1.amazonaws.com:5432/d4brobjaq8sj8t";

$admin = false;
$loginstatus = true;
$currentid = 0;

$db = pg_connect($db_url);

$uname = $_POST['uname'];
$pwd = $_POST['pwd'];

$checkuser = "SELECT COUNT(*) FROM customer WHERE 'User Name' = '$uname'";
$checkadmin = "SELECT COUNT(*) FROM admin WHERE 'User Name' = '$uname'";
$queryadmin = "SELECT * FROM customer";
$login1 = pg_query($db, $checkadmin);
$login2 = pg_query($db, $checkuser);
if ($login1 >= 1)
{
  $result1 = pg_query($db, $queryuser);
  foreach ($result1 as $results1) {
    $userid = $results1['Customer ID'];
    $name = $results1['Name'];
    $add = $results1['Address'];
    $city = $results1['City'];
    $region = $results1['Region'];
    $phone = $results1['phonene'];
  }
}
else if ($login2 >= 1)
{
  session_start();
  $_SESSION['uname'] = $uname;
  $_SESSION['pwd'] = $pwd;
  header("Location: /userpage.php");
}
else
{
  header("Location: /index.php");
  $loginstatus = false;
  $_SESSION['$loginstatus'] = $loginstatus;
}
?>
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
        <th>Country</th>
        <th>Phone</th>
      </tr>
    </thead>
    <tbody>
      <?php
      for ($i = 0; $i < 10; $i++) { 
        echo "<tr></tr>";
        echo "<td>" . $userid[$i] . "</td>";  
        echo "<td>" . $name[$i] . "</td>";  
        echo "<td>" . $add[$i] . "</td>";
        echo "<td>" . $city[$i] . "</td>";
        echo "<td>" . $region[$i] . "</td>";
        echo "<td>" . $country[$i] . "</td>";
        echo "<td>" . $phone[$i] . "</td>";  
        echo "<tr></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>