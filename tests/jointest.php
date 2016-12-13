<?php

$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";


$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare("SELECT dateiname FROM dbdateien WHERE userid =1");
//$statement = $pdo->prepare("SELECT dbdateien.dateiname FROM dbdateien INNER JOIN dbteilen ON dbteilen.userid=1");
$result= $statement->execute();
var_dump($result);





?>


