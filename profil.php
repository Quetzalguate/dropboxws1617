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

            <label class="control-label">Select File</label>
            <input id="input-2" name="input2[]" type="file" class="file" multiple data-show-upload="false" data-show-caption="true">
        </div>
        <div class="col-lg-6">
            <h3><u>Passwort ändern</u></h3>
        </div>
    </div>
</div>
<body>

</body>
</html>