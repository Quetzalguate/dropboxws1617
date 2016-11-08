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
            <h3><u>Dateiübersicht</u></h3>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Dateiname</th>
                            <th>Dateigröße</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-file"></span>Dateiname-Variable
                                        <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Umbenennen</a></li>
                                        <li><a href="#">Herunterladen</a></li>
                                        <li><a href="#">Teilen</a></li>
                                        <li><a href="#">Löschen</a></li>
                                    </ul>
                                </div>
                            </td>
                            <td>Dateigröße-Variable</td>
                        </tr>
                    </tbody>
                </table>
            </div>
</div>
</body>
</html>