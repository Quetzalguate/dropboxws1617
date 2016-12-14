<?php

$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";


$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
//$statement = $pdo->prepare("SELECT dateiname FROM dbdateien WHERE userid =1");
$statement = $pdo->prepare("SELECT dbdateien.dateiname
                            FROM dbzuweisung INNER JOIN dbdateien 
                            ON dbdateien.userid = dbzuweisung.userid"); //WHERE dbdateien.userid=1 OR dbteilen.userid=1
$statement->execute();
while ($result = $statement->fetch()){
    //var_dump($result);
    echo $result[0] . "</br>";
};






?>


