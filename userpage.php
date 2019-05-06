<!DOCTYPE html>
<html>
<head>
<title>Account Information - ATN Company</title>
</head>
<body>
<?php
session_start();
$db_url = getenv("DATABASE_URL") ?: "postgres://stejeexemgbraf:a5a875444f2192a1fb8982b181a046ce7c194400d26f9c583934ddb28d6a7b80@ec2-50-19-127-115.compute-1.amazonaws.com:5432/d4brobjaq8sj8t";

$db = pg_connect($db_url);

$queryuser = "SELECT * FROM customer WHERE user_name = '$uname' AND password = '$pwd'";
$result = pg_query($db, $queryuser);
foreach ($result as $results) {
   $userid = $results['customerid'];
   $name = $results['name'];
   $add = $results['address'];
   $city = $results['city'];
   $region = $results['region'];
   $phone = $results['phone'];
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
}
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
