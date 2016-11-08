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
    <div class="col-lg-12">
        <h3><u>Datei Umbenennen</u></h3>
        <form>
            <div class="form-group">
                <label for="text">Datei: Dateinamenvariable</label>
                <input type="text" class="from-control" placeholder="Neuen Dateinamen eingeben"
            </div>
            <button type="submit" class="btn btn-default">Datei umbenennen</button>
        </form>

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Suchergebnis</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span> Dateiname-Variable
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Umbenennen</a></li>
                            <li><a href="#">Herunterladen</a></li>
                            <li><a href="#">Teilen</a></li>
                            <li><a href="#">Löschen</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>