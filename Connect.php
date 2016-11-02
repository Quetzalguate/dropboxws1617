<?php

$servername = "localhost";
$username = "username";
$password = "password";

$conn = new PDO('mysql:host=localhost;dbname=u-jv029', 'jv029', 'IeBu2chie3');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
}
catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
?>