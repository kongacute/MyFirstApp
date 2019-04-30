<!DOCTYPE html>
<html>
<body>
	<title>Account Information - ATN Company</title>
	<h1>Account Infomation</h1>

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

while ($row = pg_fetch_row($result)) {
    var_dump($row);
}
?>
</body>
</html>