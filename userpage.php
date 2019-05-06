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
$uname = pg_escape_string($_SESSION['uname']);
$pwd = pg_escape_string($_SESSION['pwd']);
$queryuser = "SELECT * FROM customer WHERE user_name = '{$uname}' AND password = '{$pwd}'";
$result = pg_query($db, $queryuser);

?>

<div class="container">
  <h2>Customers List</h2>
  <p>List of customers</p>            
  <table class="table table-bordered">
    <tbody>
      <?php
        while ($results = pg_fetch_assoc($result)) {
          $userid = $results['customerid'];
          $name = $results['name'];
          $add = $results['address'];
          $city = $results['city'];
          $region = $results['region'];
          $phone = $results['phone'];
        echo "<tr>";
        echo "<th>Customer ID</th>";
        echo "<td>" . $userid . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Name</th>";
        echo "<td>" . $name . "</td>";
        echo "</tr>";
        echo "<tr>";  
        echo "<th>Address</th>";
        echo "<td>" . $add. "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>City/th>";
        echo "<td>" . $city . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Region</th>";
        echo "<td>" . $region . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<th>Phone</th>";
        echo "<td>" . $phone . "</td>"; 
        echo "</tr>";
    }
      
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
