<?php
$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";

$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare("SELECT * FROM dbdateien WHERE dateiname = :email");
$result = $statement->execute(array('email' => $email));
$dateiname = $statement->fetch();

echo $dateiname;
?>