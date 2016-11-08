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
        <div class="col-lg-6">
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
                                    <a class="dropdown-toggle" data-toggle="dropdown">Dateiname-Variable
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


                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($erg AS $dateiname): ?>
                        <tr>
                            <td>
                                <div class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-file"></span> <?php echo $dateiname['dateiname']; ?>
                                        <span class="caret"></span></button>
                                        <ul class="dropdown-menu">
                                            <li><a href="index.php?namef=<?php echo $dateiname['dateiname']; ?>"><span class="glyphicon glyphicon-share"></span> Freigeben</a></li>
                                            <li><a href="index.php?nameb=<?php echo $dateiname['dateiname']; ?>"><span class="glyphicon glyphicon-edit"></span> Bearbeiten</a></li>
                                            <li><a href="includes/loeschen.php?name=<?php echo $dateiname['dateiname']; ?>"><span class="glyphicon glyphicon-remove"></span> Löschen</a></li>
                                        </ul>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
</div>
</body>
</html>