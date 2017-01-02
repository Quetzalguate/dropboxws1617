<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Login</title>
    <?php session_start(); ?>



    <!-- Start Include Dateien -->
    <?php include ("includes/bsfooter2.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <?php include("includes/connection.php"); ?>

    <!-- Ende Include Dateien -->
</head>

<body>
<!-- Anfang Header -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="navbar">
                <ul class="nav nav-pills  navbar-right">
                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/reg.php" class="glyphicon glyphicon-ok-sign"> Registrieren</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Ende Header -->
</br></br></br></br></br>
<div class="container-fluid">
    <div class="row">
        <!-- Start Logo -->
        <div class="col-lg-6">
            <img class="img-responsive pull-right" src="images/minimalboxlogo.png" alt="image placeholder" width="300" height="200">
        </div>
        <!-- Ende Logo -->

        <!-- Anfang Registrierungsformular -->
        <div class="col-lg-3">
            <form action="?login=1" method="post" role="form">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="passwort">Passwort:</label>
                    <input type="password" class="form-control" id="passwort" name="passwort">
                </div>
                <button type="submit" class="btn btn-default">Login</button>
            </form>
        </div>
        <!-- Ende Registrierungsformular -->
    </div>
</div>

<!-- --------------------------------------------------- HTML -> PHP ----------------------------------------------- -->

<!-- Start Login -->
<?php
$email = $_POST['email'];
$passwort = $_POST['passwort'];
$_SESSION['email'] = $email;
if(isset($_GET['login'])) {
    //$email = $_POST['email'];
    //$passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM dbuser WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung PW
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        //$_SESSION['userid'] = $user['id'];
        //die('Login erfolgreich. Hier gelangen Sie zur <a href="geheim.php">Startseite!</a>');
        header( "refresh:0; url=https://mars.iuk.hdm-stuttgart.de/~jv029/preloader.php" );
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }

}

if(isset($errorMessage)) {
    echo "
                    <div class=\"container-fluid\">
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-danger\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>$errorMessage</strong>
                    </div>
                </div>
            </div>
    "

    ;
}
?>
<!-- Ende Login -->

</body>
</html>

