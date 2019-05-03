<!DOCTYPE html>
<html lang="en">
<head>
  <title>Seller - ATN Company</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
 // connect to database 
<?php
$db_url = getenv("DATABASE_URL") ?: "postgres://stejeexemgbraf:a5a875444f2192a1fb8982b181a046ce7c194400d26f9c583934ddb28d6a7b80@ec2-50-19-127-115.compute-1.amazonaws.com:5432/d4brobjaq8sj8t";
echo "db_url\n";

$db = pg_connect($db_url);
if ($db) {
    echo "connected";
} else {
    echo "not connected";
}

$selectSql = "SELECT * FROM customer";
$result = pg_query($db, $selectSql);

foreach ($result as $results) {
  $userid = $results['id'];
  $username = $results['username'];
  $useradd = $useradd['useradd'];
}
}
?>
// web page
<div class="container">
  <h2>Customers List</h2>
  <p>List of customers</p>            
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Customer name</th>
        <th>Address</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($results as $key => $value) {
        echo "<tr></tr>";
        echo "<td>$results['userid']</td>";  
        echo "<td>$results['username']</td>";  
        echo "<td>$results['useradd']</td>";  
        echo "<tr></tr>";
      }
      ?>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>

      ?>
    </tbody>
  </table>
</div>

</body>
</html>