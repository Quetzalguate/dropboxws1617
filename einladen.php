<!-- Start Include Dateien -->
<?php include ("includes/bsfixednavbar.php"); ?>
<?php include ("includes/bsfooter.php"); ?>
<?php include ("includes/bseinbindung.php"); ?>
<!-- Ende Include Dateien -->


<!-- Start Dateiübersicht -->
<?php ?>
<!-- Ende Dateiübersicht -->


<!-- --------------------------------------------------- PHP -> HTML ----------------------------------------------- -->


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Dropbox - Dateiübersicht</title>

</head>

<body>
</br></br>
<div class="container-fluid">
    <div class="col-lg-4">
        <h3><u>Freund einladen</u></h3>
        <form>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="email-deines-freundes@email.de">
            </div>
            <div class="form-group">
                <label for="comment">Nachricht</label>
                <textarea class="form-control" rows="5" id="comment">Hallo,
Probier die neue Dropbox aus.
Ich bin begeistert!
Hier kannst du dich Registrieren: https://mars.iuk.hdm-stuttgart.de/~jv029/reg.php
Wir sehen uns auf der anderen Seite ;-)</textarea>
            </div>
            <button type="submit" class="btn btn-default">Einladen</button>
        </form>
    </div>
</div>
</body>
</html>