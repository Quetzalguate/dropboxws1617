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
    <title>Dropbox - Profil</title>

</head>
<div class="container">
    <div class="row">
        <div class="col-lg-6">
            <h3><u>Profilbild</u></h3>
            <label class="control-label">Profilbild auswählen</label>
            <input id="input-1" type="file" class="file">
        </div>
        <div class="col-lg-6">
            <h3><u>Passwort ändern</u></h3>
            <form>
                <div class="form-group">
                    <label for="pw1">Altes Passwort:</label>
                    <input type="password" class="form-control" id="pw1">
                </div>
                <div class="form-group">
                    <label for="pw2">Neues Passwort erstellen:</label>
                    <input type="password" class="form-control" id="pw2">
                </div>
                <div class="form-group">
                    <label for="pw3">Neues Passwort wiederholen:</label>
                    <input type="password" class="form-control" id="pw3">
                </div>
                <button type="submit" class="btn btn-default">Passwort ändern</button>
            </form>
        </div>
    </div>
</div>
<body>

</body>
</html>