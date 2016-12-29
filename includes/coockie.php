<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Coockie</title>

    <!-- Start Include Dateien -->
    <?php include ("/home/jv029/public_html/includes/connection.php"); ?>
    <!-- Ende Include Dateien -->

</head>

<body>
<?php
session_start();
if(!isset($_SESSION['email'])) {
    die('Bitte zuerst <a href="login.php">einloggen</a>');
}
else {
    $email = $_SESSION['email'];

    $stmt = $pdo->prepare("SELECT userid FROM dbuser WHERE email=:email");
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $erg= $stmt->fetch();
    $userid = $erg[0];
    echo $userid;
}

?>
</body>