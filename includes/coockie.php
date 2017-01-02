<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Coockie</title>
    <!-- Start Include Dateien -->
    <?php include ("/home/jv029/public_html/includes/connection.php"); ?>
    <?php// include ("includes/bseinbindung.php"); ?>
    <!-- Ende Include Dateien -->
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['email'])) {
    die('</br></br></br></br></br></br>
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4"  align="center">
            <a class="btn btn-primary btn-lg" href="https://mars.iuk.hdm-stuttgart.de/~jv029/login.php" role="button">Sitzung abgelaufen - zum Login</a>
        </div>
    </div>
</div>
    
    ');//Bitte zuerst <a href="login.php">einloggen</a>
}
else {
    $emailsession = $_SESSION['email'];

    $stmt = $pdo->prepare("SELECT userid FROM dbuser WHERE email=:emailsession");
    $stmt->bindParam(':emailsession', $emailsession, PDO::PARAM_STR);
    $stmt->execute();
    $erg= $stmt->fetch();
    $userid = $erg[0];
    //echo $userid;
}


?>
</body>