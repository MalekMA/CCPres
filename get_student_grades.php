<?php

$student = $_GET['sname'];

$dsn = getenv('MYSQL_DSN');
$user = getenv('MYSQL_USER');
$password = getenv('MYSQL_PASSWORD');

$db = new PDO($dsn, $user, $password);

$statement = $db->prepare("SELECT name, assignment, grade FROM grades WHERE name='$student'");
$statement->execute();
$result = $statement->fetchAll();

$rows = array();
foreach($result as $r) {
    $rows[] = $r;
}
print json_encode($rows);
