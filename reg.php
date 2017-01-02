<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Registrierung</title>

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
        <div class="col-md-3">
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
            </br>
            <p class="text-center">Kostenlos deine Daten online sichern!</p>
        </div>
    </div>
</div>

<!-- --------------------------------------------------- HTML -> PHP ----------------------------------------------- -->
<!-- Start Registrierung -->
<?php

//$showFormular = true; // Registrierungsformular anzeigen?

if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '
                <div class="container-fluid">
                    <div class="col-lg-4">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Bitte eine gültige E-Mail-Adresse eingeben<br></strong>
                        </div>
                    </div>
                </div>
        ';
        $error = true;
    }
    if(strlen($passwort) == 0) {
        echo '
                <div class="container-fluid">
                    <div class="col-lg-4">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Bitte ein Passwort angeben<br></strong>
                        </div>
                    </div>
                </div>
        ';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo '
                <div class="container-fluid">
                    <div class="col-lg-4">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Die Passwörter müssen übereinstimmen<br></strong>
                        </div>
                    </div>
                </div>
        ';
        $error = true;
    }

    //checkt ob die e-mail besteht
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM dbuser WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo '
                <div class="container-fluid">
                    <div class="col-lg-4">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Diese E-Mail-Adresse ist bereits vergeben<br></strong>
                        </div>
                    </div>
                </div>
            ';
            $error = true;
        }
    }

    //nutzer wird eingetragen
    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);

        $statement = $pdo->prepare("INSERT INTO dbuser (email, passwort) VALUES (:email, :passwort)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));

        if($result) {
            echo '
            <div class="container-fluid">
                <div class="col-lg-4">
                    <div class="alert alert-success">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a></strong>
                    </div>
                </div>
            </div>
            ';
            //$showFormular = false;
        } else {
            echo '
                <div class="container-fluid">
                    <div class="col-lg-4">
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Beim Abspeichern ist leider ein Fehler aufgetreten<br></strong>
                        </div>
                    </div>
                </div>
            ';
        }
    }
}
?>
<!-- Ende Registrierung -->

</body>
</html>





