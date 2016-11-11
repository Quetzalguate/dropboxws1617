<!-- Start Include Dateien -->
<?php include ("includes/bsfixednavbar.php"); ?>
<?php include ("includes/bsfooter.php"); ?>
<?php include ("includes/bseinbindung.php"); ?>
<!-- Ende Include Dateien -->


<!-- Start Dateiübersicht -->

<!-- Ende Dateiübersicht -->


<!-- --------------------------------------------------- PHP -> HTML ----------------------------------------------- -->


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Einladen</title>

</head>

<body>
</br></br>
<div class="container-fluid">
    <div class="col-lg-4">
        <h3><u>Freund einladen</u></h3>

        <form action="einladen.php" method="POST" role="form">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email" placeholder="email-deines-freundes@email.de">
            </div>
            <div class="form-group">
                <label for="nachricht">Nachricht</label>
                <textarea class="form-control" rows="5" name="nachricht" id="nachricht">Hallo,
Probier die neue Dropbox aus.
Ich bin begeistert!
Hier kannst du dich Registrieren: https://mars.iuk.hdm-stuttgart.de/~jv029/reg.php
Wir sehen uns auf der anderen Seite ;-)</textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Einladen</button>
        </form>

    </div>
</div>

<?php
$nachricht = $_POST['nachricht'];
$email = $_POST['email'];
$headers = "From: webmaster@example.com";
if(isset($_POST['submit'])){

    mail("$email","Einladung zur Dropbox","$nachricht",$headers);
    echo "Einladung wurde versendet";

}



?>

</body>
</html>