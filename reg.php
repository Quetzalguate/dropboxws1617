<!-- Start Include Dateien -->
<?php include ("includes/bsfooter.php"); ?>
<?php include ("includes/bseinbindung.php"); ?>

<!-- Ende Include Dateien -->






<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Registrierung</title>

</head>

<body>
<!-- Anfang Header -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">

            <div class="navbar">
                <ul class="nav nav-pills  navbar-right">
                    <li><a href="https://mars.iuk.hdm-stuttgart.de/~jv029/login.php" class="glyphicon glyphicon-log-in"> Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Ende Header -->
</br></br></br></br></br>
<div class="container-fluid">
    <div class="row">
        <!-- Start Features -->
        <div class="col-lg-6">
            <img class="img-responsive pull-right" src="images/placeholder-Copy.png" alt="image placeholder" width="300" height="200">
        </div>
        <!-- Ende Features -->

        <!-- Anfang Registrierungsformular -->
        <div class="col-lg-3">
            <form action="?register=1" method="POST" role="form">
                <div class="form-group">
                    <label for="email">Email-Adresse:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                    <label for="passwort">Passwort erstellen:</label>
                    <input type="password" class="form-control" id="passwort" name="passwort">
                </div>
                <div class="form-group">
                    <label for="passwort2">Passwort wiederholen:</label>
                    <input type="password" class="form-control" id="passwort2" name="passwort2">
                </div>
                <button type="submit" class="btn btn-default">Kostenlos registrieren</button>
            </form>
        </div>
        <!-- Ende Registrierungsformular -->
        <div class="col-lg-12">
            <p class="text-center">Kostenlos deine Daten banane online sichern!</p>
        </div>
    </div>
</div>


</body>
</html>

<!-- --------------------------------------------------- HTML -> PHP ----------------------------------------------- -->



<!-- Start Registrierung -->
<?php
include("Registrierung/connection.php");
$showFormular = true; // Registrierungsformular anzeigen?

if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }

    //checkt ob die e-mail besteht
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }
    }

    //nutzer wird eingetragen
    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));

        if($result) {
            echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
            //$showFormular = false;
        } else {
            echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
        }
    }
}
?>
<!-- Ende Registrierung -->