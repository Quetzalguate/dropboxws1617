<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>MinimalBox - Profil</title>
    <link rel='shortcut icon' type='image/x-icon' href='images/minimalboxfavicon.ico' />

    <!-- Start Include Dateien -->
    <?php include ("includes/coockie.php"); ?>
    <?php include ("includes/bsfixednavbar.php"); ?>
    <?php include ("includes/bsfooter.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <?php echo $_COOKIE["background"]; ?>
    <!-- Ende Include Dateien -->

</head>
</br></br>
<div class="container-fluid">
    <div class="row">
        <div class='col-lg-3'></div>
        <div class="col-lg-3" align="right">
            <h3>Ändere dein Profilbild</h3>
            <img class="img-responsive" src="images/placeholder-Copy.png" alt="image placeholder" width="300" height="200">
            <label class="control-label">Profilbild auswählen</label>
           <form>
                <input id="input-1" type="file" class="file">
                </br>
                <button type="submit" class="btn btn-default">Datei hochladen</button>
           </form>
        </div>
        <div class="col-lg-3">
            <h3>Ändere dein Passwort</h3>
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