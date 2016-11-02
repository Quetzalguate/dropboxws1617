<?php

$servername = "localhost";
$username = "u-jv029";
$password = "IeBu2chie3";


$conn = new PDO("mysql:host=$servername;dbname=myDB", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
}
catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?><?php
/**
 * Created by PhpStorm.
 * User: Ludi
 * Date: 02.11.2016
 * Time: 12:32
 */