<?php
//
$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";


try {
    $conn = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e)
{
    echo "Connection failed: " . $e->getMessage();
}
?>
/**
 * Created by PhpStorm.
 * User: Ludi
 * Date: 02.11.2016
 * Time: 12:32
 */