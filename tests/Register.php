<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Registrierung</title>
</head>
<body>
<?php

$servername = "localhost";
$username = "jv029";
$password = "IeBu2chie3";
$pdo = new PDO("mysql:host=$servername;dbname=u-jv029", $username, $password);
$user = $_POST['user'];
$passwort = $_POST['passwort'];
$passwort2 = $_POST['passwort2'];

$passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

$statement = $pdo->prepare("INSERT INTO dbuser (user, passwort) VALUES (:user, :passwort)");
$result = $statement->execute(array('user' => $user, 'passwort' => $passwort_hash));
if($result) {
    echo 'Du wurdest erfolgreich registriert.'
?>

<form action="" method="post">
    Name:<br>
    <input type="user" size="40" maxlength="250" name="user"><br><br>

Dein Passwort:<br>
    <input type="passwort" size="40"  maxlength="250" name="passwort"><br>

Passwort wiederholen:<br>
    <input type="passwort" size="40" maxlength="250" name="passwort2"><br><br>

    <input type="submit" value="Abschicken">
</form>

</body>
</html>