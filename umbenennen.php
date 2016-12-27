




<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Minimalbox - Umbenennen</title>

    <!-- Start Include Dateien -->
    <?php include ("includes/bsfixednavbar.php"); ?>
    <?php include ("includes/bsfooter.php"); ?>
    <?php include ("includes/bseinbindung.php"); ?>
    <!-- Ende Include Dateien -->
</head>

<body>
</br></br>
<div class="container-fluid">
    <div class="col-lg-12">
        <h3><u>Datei Umbenennen</u></h3>
        <form>
            <div class="form-group">
                <label for="text">Datei: Dateinamenvariable</label>
                <input type="text" class="from-control" name="neuerdateiname" placeholder="Neuen Namen eingeben"
            </div>
            <button type="submit" class="btn btn-default" name="umbenennen">Umbenennen</button>
        </form>
    </div>
</div>

<!-- --------------------------------------------------- HTML -> PHP ----------------------------------------------- -->

<?php

//aus neu vergebenen Dateinamen einen neuen hashwert erzeugen
//neuen hashwert in dbdateien speichern --> userid und extension hinten dran hängen
//der Datei selbst auf dem Server, wird umbenannt zu dem neuen hashwert

?>

</body>
</html>