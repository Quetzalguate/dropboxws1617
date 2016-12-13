<?php include ("includes/connection.php");


$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$statement = $pdo->prepare("SELECT dateiname FROM dbdateien WHERE userid =1")
//$statement = $pdo->prepare("SELECT dbdateien.dateiname FROM dbdateien INNER JOIN dbteilen ON dbteilen.userid=1");
$statement->execute();
echo $statement;





?>


