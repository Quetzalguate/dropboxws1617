<?php
$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";

$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare("SELECT dateiname FROM dbzuordnung WHERE userid =1");
$statement->execute();
$dateiname = $statement->fetch();
$dateiname = $statement->fetch();

//var_dump($dateiname);
echo $dateiname[0];

//http://www.php-einfach.de/mysql-tutorial/komplexere-datenabfrage/
?>

