<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Einladen</title>
    <link rel='shortcut icon' type='image/x-icon' href='images/minimalboxfavicon.ico' />

    <!-- Start Include Dateien -->
    <?php include ("includes/coockie.php"); ?>
    <?php include ("includes/bsfixednavbar.php"); ?>
    <?php include ("includes/bsfooter.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <?php echo $_COOKIE["background"]; ?>
    <!-- Ende Include Dateien -->

</head>

<body>
</br></br>
<div class="container-fluid">
    <div class='col-lg-4'></div>
    <div class="col-lg-4" align="center">
        <h3>Lade einen Freund ein</h3>
        </br></br>
        <form action="einladen.php" method="POST" role="form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email-deines-freundes@email.de">
            </div>
            </br>
            <div class="form-group">
                <label for="nachricht">Nachricht</label>
                <textarea class="form-control" rows="5" name="nachricht" id="nachricht">Hallo,
Probier die neue MinimalBox aus.
Ich bin begeistert!
Hier kannst du dich registrieren: https://mars.iuk.hdm-stuttgart.de/~jv029/reg.php
Wir sehen uns auf der anderen Seite ;-)</textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Einladen</button>
        </form>

    </div>
</div>






</body>
</html>

<!-- --------------------------------------------------- HTML -> PHP ----------------------------------------------- -->

<!-- Start Einladung -->
<?php
$nachricht = $_POST['nachricht'];
$email = $_POST['email'];
$emailvon = "From: MinimalBox@example.com";
$meldung = "Einladung wurde versendet";


    if (isset($_POST['submit'])) {

        if (!empty($email) && !empty($nachricht)) {

            mail("$email", "Einladung zur MinimalBox", "$nachricht", $emailvon);
            echo "
            <div class=\"container-fluid\">
            <div class='col-lg-4'></div>
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-success\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Du hast deinen Freund erfolgreich eingeladen!</strong>
                    </div>
                </div>
            </div>
        ";

        }
        else
            echo "
                <div class=\"container-fluid\">
                <div class='col-lg-4'></div>
                <div class=\"col-lg-4\">
                    <div class=\"alert alert-danger\">
                        <a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>
                        <strong>Keines der Felder darf leer sein!</strong>
                    </div>
                </div>
            </div>
    ";
    }
?>
<!-- Ende Einladung -->